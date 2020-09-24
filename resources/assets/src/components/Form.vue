<template>
  <div>
    <div class="media align-items-center py-3 my-4" v-if="!!$route.params.userId">
      <img src="https://placekitten.com/80/80" alt class="d-block rounded-circle" />

      <div class="media-body ml-4">
        <h4 class="font-weight-bold mb-0">
          {{usuario.nome}}
          <!-- <span class="text-muted font-weight-normal">@{{usuario.username}}</span> -->
        </h4>
        <div class="text-muted mb-2">ID: {{usuario.id}}</div>
        <b-button size="sm" :to="`/view/${usuario.id}`">Visualizar</b-button>&nbsp;
        <b-button size="sm" variant="danger" @click="$refs.modal.open()">Excluir</b-button>
      </div>
    </div>

    <div class="align-items-center py-3 my-4" v-if="!$route.params.userId">
      <h3 class="font-weight-bold text-center mb-0">Novo usuário</h3>
    </div>

    <div class="card my-4">
      <div class="card-body">
        <form v-on:submit.prevent="onSubmitForm">
          <div class="form-group row">
            <label for="nome" class="col-sm-2 col-form-label">Nome:</label>
            <div class="col-sm-10">
              <input
                type="text"
                required
                id="nome"
                class="form-control"
                placeholder="Nome"
                v-model="usuario.nome"
              />
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">E-mail:</label>
            <div class="col-sm-10">
              <input
                type="text"
                required
                id="email"
                class="form-control"
                placeholder="email@example.com"
                v-model="usuario.email"
              />
            </div>
          </div>
          <div class="form-group row">
            <label for="cpf" class="col-sm-2 col-form-label">CPF:</label>
            <div class="col-sm-10">
              <input
                type="text"
                required
                id="cpf"
                class="form-control"
                placeholder="000.000.000-00"
                pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}"
                v-model="usuario.cpf"
              />
            </div>
          </div>

          <div class="form-group row">
            <label for="data_nascimento" class="col-sm-2 col-form-label">Data de nascimento:</label>
            <div class="col-sm-10">
              <input
                type="text"
                required
                id="data_nascimento"
                class="form-control"
                placeholder="1999-01-01"
                pattern="[0-9]{3,4}-[0-9]{2}-[0-9]{2}"
                v-model="usuario.data_nascimento"
              />
            </div>
            <small id="cep-busca" class="form-text text-black-50 px-4">Use o formato YYYY-dd-mm.</small>
          </div>
          <div class="form-group row">
            <label for="cep" class="col-sm-2 col-form-label">CEP:</label>
            <div class="col-sm-10 input-group">
              <input
                type="text"
                required
                id="cep"
                class="form-control"
                placeholder="00000000"
                minlength="8"
                maxlength="8"
                pattern="[0-9]{8}"
                v-model.number="usuario.cep"
                aria-describedby="cep-busca"
              />
              <div class="input-group-append">
                <button
                  class="btn btn-outline-secondary"
                  type="button"
                  id="button-cep"
                  @click="buscaCep"
                >
                  <font-awesome-icon :icon="['fa', 'search']" class="text-secondary" />
                </button>
              </div>
            </div>
            <small
              id="cep-busca"
              class="form-text text-black-50 px-4"
            >Use o botão de busca para completar o endereço.</small>
            <div class="alert alert-danger" role="alert" v-if="invalidCep">Este CEP não é válido</div>
          </div>
          <div class="form-group row">
            <label for="endereco" class="col-sm-2 col-form-label">Endereço:</label>
            <div class="col-sm-10">
              <input
                type="text"
                required
                id="endereco"
                class="form-control"
                placeholder="Rua Quebraqueixo, n 155"
                v-model="usuario.endereco"
              />
            </div>
          </div>
          <div class="form-group row">
            <label for="cidade" class="col-sm-2 col-form-label">Cidade:</label>
            <div class="col-sm-10">
              <input
                type="text"
                required
                id="cidade"
                class="form-control"
                placeholder="Manaus"
                v-model="usuario.cidade"
              />
            </div>
          </div>
          <div class="form-group row">
            <label for="estado" class="col-sm-2 col-form-label">Estado:</label>
            <div class="col-sm-10">
              <input
                type="text"
                required
                id="estado"
                class="form-control"
                placeholder="Amazonas"
                v-model="usuario.estado"
              />
            </div>
          </div>

          <div class="form-group row">
            <label for="telefone" class="col-sm-2 col-form-label">Telefone:</label>
            <div class="col-sm-10">
              <input
                type="tel"
                required
                id="telefone"
                class="form-control"
                placeholder="000 00000-0000"
                pattern="[0-9]{2,3}\s?[0-9]{4,5}\s?[0-9]{4}"
                v-model="usuario.telefone"
              />
            </div>
          </div>

          <div class="form-group row">
            <div class="col">
              <b-button class="w-100" type="submit" variant="success">Enviar</b-button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <sweet-modal ref="modal">
      Tem certeza que deseja excluir esse registro?
      <template slot="button">
        <b-button variant="primary" @click="excluirUsuario()">Confirmar</b-button>
      </template>
      <template slot="box-action"></template>
    </sweet-modal>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "usuario",
  metaInfo: {
    title: "Visualizar",
  },
  props: {},
  data: () => {
    return { usuario: {}, invalidCep: false };
  },
  async created() {
    if (this.$route.params.userId) {
      this.loadUsuario();
    }
  },
  async updated() {},
  methods: {
    loadUsuario(callback = null) {
      return axios
        .get(`http://localhost:8000/api/usuario/${this.$route.params.userId}`)
        .then((response) => {
          callback && callback();
          return response.data.data;
        })
        .then((data) => (this.usuario = data));
    },
    excluirUsuario() {
      return axios
        .delete(`http://localhost:8000/api/usuario/${this.usuario.id}`)
        .then((response) => {
          this.$refs.modal.close();
          this.$router.push("/");
          return response.data.data;
        });
    },
    onSubmitForm(e) {
      if (this.$route.params.userId) {
        return axios
          .put(
            `http://localhost:8000/api/usuario/${this.usuario.id}`,
            this.usuario
          )
          .then((response) => {
            this.$router.push(`/view/${this.usuario.id}`);
            return response.data.data;
          });
      } else {
        return axios
          .post(`http://localhost:8000/api/usuario`, this.usuario)
          .then((response) => {
            this.$router.push(`/view/${response.data.data.id}`);
            return response.data.data;
          });
      }
    },
    buscaCep() {
      axios
        .get(`https://viacep.com.br/ws/${this.usuario.cep}/json`)
        .then((r) => {
          console.log(r.data);
          if (r.data.erro) {
            return Promise.reject(r);
          }
          return r;
        })
        .catch((r) => {
          this.invalidCep = true;
        })
        .then((response) => {
          return response.data;
        })
        .then((data) => ({
          endereco: data.logradouro,
          cidade: data.localidade,
          estado: data.uf,
        }))
        .then((data) => {
          this.invalidCep = false;
          this.usuario = { ...this.usuario, ...data };
        });
    },
  },
};
</script>

<style scoped>
.user-view-table td {
  padding-left: 0;
  padding-right: 0;
}
.user-view-table td:first-child {
  width: 12rem;
}
</style>