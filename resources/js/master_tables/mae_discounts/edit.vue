<template>

	<main id="tg-main" class="tg-main tg-haslayout" style="background: rgb(219, 219, 219);">
		<section class="card tg-dbsectionspace tg-haslayout">
        <div class="tg-formtheme tg-formdashboard">
          <fieldset>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6 tg-lgcolwidthhalf">
              <div class="tg-dashboardbox">
                <div class="card-header tg-dashboardboxtitle">
                  <h2>Registrar Descuento</h2>
                </div>
                <div class="card-body tg-dashboardholder">
                  <div class="form-group">
                      <input type="text"  v-model="discounts_name" class="form-control" placeholder="Nombre del descuento">
                  </div>
                  <div class="form-group">
                      <input type="number"  v-model="discounts_porcentaje" class="form-control" placeholder="tasa de porcentaje">
                  </div>
                  <div class="form-group">
                      <label >Fecha de Inicio</label>
                      <input type="date"  v-model="discounts_start_date" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label> Fecha de Finalización</label>
                      <input type="date"  v-model="discounts_end_date" class="form-control" >
                  </div>
                  <div class="form-group">
                      <input type="text"  v-model="discounts_stock_max" class="form-control" placeholder="Stock maximo">
                  </div>
                  <div class="form-group">
                      <button class="btn btn-primary" type="button" @click="PostDiscount">Registrar</button>
                  </div>
                </div>
              </div>
            </div>
          </fieldset>
        </div>
		</section>
	</main>
	
</template>


<script>

export default {

  data:function(){
      return {
        data_discounts: this.$route.params.data_discounts,
        discounts_id:'',
        discounts_name:'',
        discounts_porcentaje:'',
        discounts_start_date:'',
        discounts_end_date:'',
        discounts_stock_max:'',
      }
  },


  methods:{

        PostDiscount(){

                let  data = new FormData()
                data.append("discounts_id", this.discounts_id)
                data.append("discounts_name", this.discounts_name)
                data.append("discounts_porcentaje", this.discounts_porcentaje)
                data.append("discounts_start_date", this.discounts_start_date)
                data.append("discounts_end_date", this.discounts_end_date)
                data.append("discounts_stock_max", this.discounts_stock_max)
                axios.post('/post_discount', data)
                    .then(response => {
                        if (response.data.status==='success') {
                            Swal.fire({
                              title: response.data.message,
                              text: 'Descuento Registrado',
                              type: 'success',
                              confirmButtonText: 'OK'
                            });
                            this.$router.replace('/discount');
                        }else{
                            Swal.fire({
                              title: response.data.message,
                              text: 'Medidas Incorrectas de las Imagenes',
                              type: 'success',
                              confirmButtonText: 'OK'
                            })
                        };
                }).catch(function (error) {
                    console.log(error);
                });
        },

  },

   mounted() {
    	let self = this
    	self.data_discounts;
      self.discounts_name = self.data_discounts['discounts_name'];
      self.discounts_id = self.data_discounts['discounts_id'];
      self.discounts_porcentaje = self.data_discounts['discounts_porcentaje'];
      self.discounts_start_date = self.data_discounts['discounts_start_date'];
      self.discounts_end_date = self.data_discounts['discounts_end_date'];
      self.discounts_stock_max = self.data_discounts['discounts_stock_max'];
  }
  
  
};
</script>