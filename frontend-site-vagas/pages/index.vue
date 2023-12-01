<template>
  <body>
    <main
      class="bg-[#4D3CAD] h-[100vh] flex flex-col justify-center items-center"
    >
      <h1 class="font-semibold text-lg">Cadastrar Usuário</h1>
      <div
        class="flex flex-col items-center justify-evenly bg-[#3D3C8D] w-1/2 h-1/2 rounded-xl"
      >
        <div>
          <div class="flex flex-col flex-wrap align-items-center">
            <label for="username" >Username</label>
            <InputText
              id="username"
              placeholder="Username"
              class="h-10"
              v-model="login"
            />
          </div>
          <div class="flex flex-col flex-wrap align-items-center">
            <label for="password" >Senha</label>
            <InputText
              id="password"
              placeholder="Senha"
              class="h-10"
              v-model="password"
            />
          </div>
        </div>
        <div>
          <div class="flex flex-col flex-wrap align-items-center">
            <label for="password" >Tipo Perfil</label>
            <Dropdown
              :options="options"
              option-label="label"
              option-value="value"
              id="password"
              placeholder="Perfil"
              v-model="perfil"
            />
          </div>
        </div>
        <div>
          <Button
            @click="criarUsuario"
            class="bg-[#e9e9e9] rounded-lg p-1 hover:bg-[#2b215f] hover:text-white"
            >Próximo</Button
          >
        </div>
      </div>
    </main>
  </body>
</template>

<script lang="ts" setup>
const login = ref("");
const password = ref("");
const perfil = ref("");
const options = ref([
  {
    label: 'Candidato',
    value: 'candidato'
  },
  {
    label: 'Empresa',
    value: 'empresa'
  }
])
const criarUsuario = async () => {
  const url = "http://localhost:8000/api/usuario";
  try {
    const payload = {
      login: login.value,
      password: password.value,
      tipo_perfil: perfil.value
    };
    await $fetch(url, {
      method: "POST",
      body: payload,
    });
  } catch (error) {
    console.error(error);
  }
};
</script>
