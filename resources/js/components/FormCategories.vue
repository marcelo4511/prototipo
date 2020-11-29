<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="card">
                        <div class="card-body">
                            <h5><strong>Cadastro de Categorias</strong></h5>
                            <label for="">Nome</label>
                            <div class="form-group">
                                <input type="text" class="form-control" v-model="form.name" required>
                                <button class="btn btn-success m-3" @click.prevent="save" type="button">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                baseUrl:process.env.MIX_BASE_URL,
                form:{
                    name:null
                }
            }
        },

        methods:{

            async save(){
                await axios.post(`${this.baseURL}/config/categorias`,this.form)
                .then(res => {
                  console.log(res.data)

                })
                return (window.location.href=`${this.baseURL}/config/categorias`);
            }
        }
    }
</script>