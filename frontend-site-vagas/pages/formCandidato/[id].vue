<template>
  <body>
    <main class="bg-[#4D3CAD] h-[100vh] flex justify-center items-center">
      <div class="flex flex-col w-1/2 bg-[#3D3C8D] p-3">
        <div class="flex justify-center">
          <h1 class="font-bold text-lg">Dados Pessoais</h1>
        </div>
        <div class="flex flex-wrap space-x-5">
          <div class="flex flex-col flex-wrap align-items-center">
            <label for="nome" >Nome</label>
            <InputText
              id="nome"
              placeholder="Nome"
              class="h-10"
              v-model="form.pessoa.nome"
            />
          </div>
          <div class="flex flex-col flex-wrap align-items-center">
            <label for="sobrenome" >Sobrenome</label>
            <InputText
              id="sobrenome"
              placeholder="Sobrenome"
              class="h-10"
              v-model="form.pessoa.sobrenome"
            />
          </div>
            <div class="flex flex-col flex-wrap align-items-center">
              <label for="celular" >Celular</label>
              <InputNumber
                id="celular"
                placeholder="Celular"
                class="h-10"
                v-model="form.pessoa.celular"
              />
            </div>
            <div class="flex flex-col flex-wrap align-items-center">
              <label for="cidade" >Cidade</label>
              <InputText
                id="cidade"
                placeholder="Cidade"
                class="h-10"
                v-model="form.pessoa.cidade"
              />
            </div>
            <div class="flex flex-col flex-wrap align-items-center">
              <label for="cidade" >Titulo Perfil</label>
              <InputText
                id="cidade"
                placeholder="Titulo Perfil"
                class="h-10"
                v-model="form.apresentacao.titulo_perfil"
              />
            </div>
            <div class="flex flex-col flex-wrap align-items-center">
              <label for="cidade" >Nível Inglês</label>
              <InputText
                id="cidade"
                placeholder="Nível Inglês"
                class="h-10"
                v-model="form.apresentacao.nivel_ingles"
              />
            </div>
            <div class="flex flex-col flex-wrap align-items-center">
              <label for="cidade" >Descrição</label>
              <InputText
                id="cidade"
                placeholder="Descrição"
                class="h-10"
                v-model="form.apresentacao.descricao"
              />
            </div>
            <div class="flex flex-col flex-wrap align-items-center">
              <label for="cidade" >Link Linkedin</label>
              <InputText
                id="cidade"
                placeholder="Descrição"
                class="h-10"
                v-model="form.apresentacao.link_linkedin"
              />
            </div>
            <div class="flex flex-col flex-wrap align-items-center">
              <label for="cidade" >Link Github</label>
              <InputText
                id="cidade"
                placeholder="Descrição"
                class="h-10"
                v-model="form.apresentacao.link_github"
              />
            </div>
            <div class="flex flex-col flex-wrap align-items-center">
              <label for="cidade" >Foco Carreira</label>
              <InputText
                id="cidade"
                placeholder="Descrição"
                class="h-10"
                v-model="form.habilidades.foco_carreira"
              />
            </div>
            <div class="flex flex-col flex-wrap align-items-center">
              <label for="cidade" >Nível Experiência</label>
              <InputText
                id="cidade"
                placeholder="Descrição"
                class="h-10"
                v-model="form.habilidades.nivel_experiencia"
              />
            </div>
            <div class="flex flex-col flex-wrap align-items-center">
              <label for="cidade" >Tecnologias</label>
              <InputText
                id="cidade"
                placeholder="Descrição"
                class="h-10"
                v-model="form.habilidades.tecnologias"
              />
            </div>
            <div class="flex flex-col flex-wrap align-items-center">
              <label for="cidade" >Nome da Empresa</label>
              <InputText
                id="cidade"
                placeholder="Descrição"
                class="h-10"
                v-model="form.experiencias.nome_empresa"
              />
            </div>
            <div class="flex flex-col flex-wrap align-items-center">
              <label for="cidade">Cargo</label>
              <InputText
                id="cidade"
                placeholder="Descrição"
                class="h-10"
                v-model="form.experiencias.cargo"
              />
            </div>
            <div class="flex flex-col flex-wrap align-items-center">
              <label for="cidade">Data Início</label>
              <input
                type="date"
                id="cidade"
                placeholder="Descrição"
                class="h-10"
                v-model="form.experiencias.data_inicio"
              />
            </div>
            <div class="flex flex-col flex-wrap align-items-center">
              <label for="cidade" >Data Fim</label>
              <input
                type="date"
                id="cidade"
                placeholder="Descrição"
                class="h-10"
                v-model="form.experiencias.data_fim"
              />
            </div>
            <div class="flex flex-col flex-wrap align-items-center">
              <label for="cidade" >Trabalho Atualmente</label>
              <InputSwitch
                id="cidade"
                placeholder="Descrição"
                class="h-10"
                v-model="form.experiencias.trabalho_atual"
              />
            </div>
            <div class="flex flex-col flex-wrap align-items-center">
              <label for="cidade" >Descrição</label>
              <InputText
                id="cidade"
                placeholder="Descrição"
                class="h-10"
                v-model="form.experiencias.descricao"
              />
            </div>
        </div>
        <!-- LINHA 2 -->
        <div class="flex justify-center pt-10">
          <Button
            @click="cadastrarDadosPessoais"
            class="bg-[#e9e9e9] rounded-lg p-1 hover:bg-[#2b215f] hover:text-white"
            >Próximo</Button
          >
        </div>
      </div>
    </main>
  </body>
</template>

<script lang="ts" setup>
const form = ref({
    pessoa: {
        nome: "",
        sobrenome:"",
        celular:"",
        cidade:""
    },
    apresentacao: {
        titulo_perfil:"",
        nivel_ingles:"",
        descricao: "",
        link_github:"",
        link_linkedin:""
    },
    habilidades: {
        foco_carreira: "",
        nivel_experiencia:"",
        tecnologias:""
    },
    experiencias: {
        nome_empresa:"",
        cargo:"",
        data_inicio:"",
        data_fim:"",
        trabalho_atual: false,
        descricao:""
    }
});


    const cadastrarDadosPessoais = async () => {
        const url = `http://localhost:8000/api/usuario/cadastro-pessoal/1`;
        try {
            const payload = {
                ...form.value
            }
            await $fetch(url, {
                method:"POST",
                body: payload
            })
        } catch (error) {
            console.error(error);
        }
    }
</script>
