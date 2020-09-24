<template>
  <div class>
    <h2 class="text-center">Lista de usuários</h2>
    <hr />
    <ul class="list-group">
      <list-item
        class="list-group-item"
        v-for="u of usuarios"
        :key="u.id"
        :usuario="u"
        v-on:update-list="onUploadList"
      ></list-item>
    </ul>
  </div>
</template>

<script>
import axios from "axios";
import ListItem from "./components/ListItem";

export default {
  name: "home",
  components: {
    ListItem,
  },
  data: () => {
    return { usuarios: [] };
  },
  async created() {
    this.loadUsuarios();
  },
  async updated() {},
  methods: {
    loadUsuarios(callback = null) {
      return axios
        .get("http://localhost:8000/api/usuario")
        .then((response) => {
          callback && callback();
          return response.data.data;
        })
        .then((data) => (this.usuarios = data));
    },
    onUploadList(e) {
      this.loadUsuarios();
    },
  },
};
</script>

<style scoped>
</style>