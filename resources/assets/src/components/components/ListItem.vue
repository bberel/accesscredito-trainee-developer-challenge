<template>
  <li>
    <div class="media">
      <img src="https://placekitten.com/50/50" alt class="d-block rounded-circle mr-3" />

      <div class="media-body">
        <h5 class="mt-0">
          <router-link class="text-primary" :to="`/view/${usuario.id}`">{{usuario.nome}}</router-link>
        </h5>
        <div>
          <font-awesome-icon :icon="['fa', 'envelope']" class="text-secondary" />
          <a class="text-muted" :href="'mailto:' + usuario.email">{{usuario.email}}</a>
        </div>
        <div>
          <font-awesome-icon :icon="['fa', 'phone-alt']" class="text-secondary" />
          <a class="text-muted" :href="'tel:+' + usuario.telefone">{{usuario.telefone}}</a>
        </div>
      </div>

      <div>
        <b-button size="sm" :href="`/edit/${usuario.id}`">Editar</b-button>
        <b-button size="sm" variant="danger" @click="$refs.modal.open()">Excluir</b-button>
      </div>
    </div>

    <sweet-modal ref="modal">
      Tem certeza que deseja excluir esse registro?
      <template slot="button">
        <b-button variant="primary" @click="excluirUsuario()">Confirmar</b-button>
      </template>
      <template slot="box-action"></template>
    </sweet-modal>
  </li>
</template>

<script>
import axios from "axios";

export default {
  name: "list-item",
  props: {
    usuario: {
      required: true,
    },
  },
  data: () => {
    return {};
  },
  async created() {},
  async updated() {},
  methods: {
    excluirUsuario() {
      return axios
        .delete(`http://localhost:8000/api/usuario/${this.usuario.id}`)
        .then((response) => {
          this.$emit("update-list");
          this.$refs.modal.close();
          return response.data.data;
        });
    },
  },
};
</script>

<style scoped>
</style>