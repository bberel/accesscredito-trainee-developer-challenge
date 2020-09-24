<template>
  <div>
    <div class="media align-items-center py-3 my-4">
      <img src="https://placekitten.com/80/80" alt class="d-block rounded-circle" />

      <div class="media-body ml-4">
        <h4 class="font-weight-bold mb-0">
          {{usuario.nome}}
          <!-- <span class="text-muted font-weight-normal">@{{usuario.username}}</span> -->
        </h4>
        <div class="text-muted mb-2">ID: {{usuario.id}}</div>
        <b-button size="sm" :to="`/edit/${usuario.id}`">Editar</b-button>&nbsp;
        <b-button size="sm" variant="danger" @click="$refs.modal.open()">Excluir</b-button>
      </div>
    </div>

    <div class="card my-4">
      <div class="card-body">
        <table class="table table-sm table-borderless user-view-table m-0">
          <tbody>
            <!-- <tr>
              <td>Username:</td>
              <td></td>
            </tr>-->
            <tr>
              <td>Nome:</td>
              <td>{{usuario.nome}}</td>
            </tr>
            <tr>
              <td>E-mail:</td>
              <td>{{usuario.email}}</td>
            </tr>
            <tr>
              <td>CPF:</td>
              <td>{{usuario.cpf}}</td>
            </tr>
          </tbody>
        </table>

        <h6 class="mt-4 mb-3">Dados pessoais</h6>

        <table class="table table-sm table-borderless user-view-table m-0">
          <tbody>
            <tr v-if="usuario.data_nascimento">
              <td>Data de nascimento:</td>
              <td>{{usuario.data_nascimento}}</td>
            </tr>
            <tr v-if="usuario.endereco">
              <td>Endereço:</td>
              <td>{{usuario.endereco}}</td>
            </tr>
            <tr v-if="usuario.cidade">
              <td>Cidade:</td>
              <td>{{usuario.cidade}}</td>
            </tr>
            <tr v-if="usuario.estado">
              <td>Estado:</td>
              <td>{{usuario.estado}}</td>
            </tr>
            <tr v-if="usuario.cep">
              <td>CEP:</td>
              <td>{{usuario.cep}}</td>
            </tr>
          </tbody>
        </table>

        <h6 class="mt-4 mb-3">Contato</h6>

        <table class="table table-sm table-borderless user-view-table m-0">
          <tbody>
            <tr v-if="usuario.telefone">
              <td>Telefone:</td>
              <td>{{usuario.telefone}}</td>
            </tr>
          </tbody>
        </table>
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
export default {
  name: "usuario",
  metaInfo: {
    title: "Visualizar",
  },
  props: {},
  data: () => {
    return { usuario: {} };
  },
  async created() {
    this.loadUsuario();
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