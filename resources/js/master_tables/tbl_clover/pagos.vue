<template>
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page-header start -->
                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                              <div class="page-header-title">
                                  <div class="d-inline">
                                      <h4>Clover</h4>                                                        
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="page-body">
                      <div class="row">
                          <div class="col-sm-12">
                              <!-- Basic Form Inputs card start -->
                              <div class="card">
                                  <div class="card-block">
                                    <form>
                                      <div class="row">
                                          <div class="col-lg-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text"  id="basic-addon1">Monto</span></div>
                                                    <input type="numeric"  v-model="amount" class="form-control">
                                                </div>
                                          </div>
                                      </div>                                        
                                      <br><br>
                                      <div class=" ">
                                            <button class="btn btn-primary" type="button" @click="PostClover">Registrar</button>
                                            <router-link :to="{path: '/category'}">
                                              <button class="btn btn-danger" type="button" >Cancelar</button>
                                            </router-link>
                                      </div>
                                    </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'

export default {
    components: {
        vue2Dropzone,
    },

    data:function() {
        return {
            amount: 0,
        };
    },

    methods: {
        PostClover() {
            //let data = new FormData();
            //data.append('clover_amount', this.amount);
            const options = {
                method: 'GET',
                headers: {
                    Accept: 'application/json',
                    Authorization: 'Bearer c153c3d8-d203-ecde-2854-43426dfd5056'
                }
            };

            fetch('https://sandbox.dev.clover.com/v3/merchants/RSVJX4TBDHDS1', options)
                .then(response => response.json())
                .then(response => console.log(response))
                .catch(err => console.log(err));
            /*axios.get('https://sandbox.dev.clover.com/v3/merchants/RSVJX4TBDHDS1', 
                {
                    headers: 
                    {
                        'Accept' : 'application/json',
                        'Authorization' : 'Bearer c153c3d8-d203-ecde-2854-43426dfd5056',
                    }
                })
                .then(response => {
                    console.log(response);
                    /*if(response.data.status === 'success') {
                        Swal.fire({
                            title: response.data.message,
                            text: 'Venta Enviada',
                            type: 'success',
                            confirmButtonText: 'OK'
                        });
                    }*/
                /*})
                .catch(function(error) {
                    console.log(error);
                });*/
        }
    }
};
</script>
