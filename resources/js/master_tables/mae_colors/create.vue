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
                    <h4>Registrar Color</h4>                                                        
                  </div>
                </div>
              </div>
            </div>
          </div>
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
                              <span class="input-group-text"  id="basic-addon1">Nombre del color</span>
                            </div>
                            <input type="text"  v-model="color_name" class="form-control">
                          </div>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"  id="basic-addon1">Color Code</span>
                            </div>
                            <input type="text"  v-model="color_code" class="form-control">
                          </div>
                        </div>
                      </div>                                        
                      <br><br>
                      <div class=" ">
                        <button class="btn btn-primary" type="button" @click="PostColor">Registrar</button>
                        <router-link :to="{path: '/color'}">
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
export default {
  data:function(){
      return {
        color_name: '',
        color_code: null,
      }
  },

  methods:{
    PostColor(){
      let  data = new FormData()

      data.append("color_name", this.color_name)
      data.append("color_code", this.color_code)
      axios.post('/post_color', data,{ headers: {'Content-Type': 'multipart/form-data'}})
        .then(response => {
          if (response.data.status==='success') {
            Swal.fire({
              title: response.data.message,
              text: 'Color Registrado',
              type: 'success',
              confirmButtonText: 'OK'
            });
            this.$router.replace('/color');
          } else {
            Swal.fire({
              title: response.data.message,
              text: 'Color Invalido',
              type: 'success',
              confirmButtonText: 'OK'
            })
          };
        }).catch(function (error) {
          console.log(error);
        });
    },
  },  
};
</script>