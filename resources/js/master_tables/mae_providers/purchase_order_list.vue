<template>

  <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">
                  <div class="page-body">
                    <div class="row">
                        <!--Modal-->
                          <div  class="permiso" :class="{'mostrar' : modal}" style="overflow-y: auto;padding-top: 50px;">
                              <div class="permiso-content">
                                      <div class="modal-header">
                                          <button @click="Cerrar"> X </button>
                                      </div>
                                      <div class="modal-body">
                                          <div class="row">
                                              <div class="form-group">
                                                <label>Porfavor, escriba su queja</label>
                                                <input type="text" class="form-control" v-model="purchase_orders_complain">
                                              </div>
                                          </div>
                                          <div class="row">
                                                    <table class="table table-responsive">
                                                        <thead>
                                                            <tr>
                                                              <td>Nombre del producto</td>
                                                              <td>Cantidad</td>
                                                              <td>Sub-Monto</td>
                                                              <td></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr v-for="(data, index) in data_order">
                                                              <td>{{data.products_name}}</td>
                                                              <td> <input type="text" class="form-control" v-model="data.total_products"> </td>
                                                              <td>{{ parseFloat(data.products_price* data.total_products ).toFixed(2)}}</td>
                                                              <td> <button ><i class="fa fa-trash"> </i></button></td>
                                                            </tr>
                                                            <tr>
                                                              <td></td>
                                                              <td>Total</td>
                                                              <td>{{ purchase_orders_total_price= parseFloat(Total_Pedidos).toFixed(2)}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                          </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-primary" @click="ActualizarPedido">Guardar</button>
                                      </div>
                              </div>            
                          </div>
                        <!--Cerrar Modal-->
                        <div class="col-sm-12">
                          <div class="card">
                            <div class="card-block">
                              <div class="row">
                                <div class="col-md-12">
                                  <div id="wizard1">
                                    <section>
                                      <div class="wizard-form wizard clearfix" id="basic-forms">
                                          <div class="steps clearfix">
                                            <ul role="tablist">
                                              <li style="width: 50% !important;" role="tab" class="done" aria-disabled="false" aria-selected="true" align="center">
                                                  <a href="/provider" id="basic-forms-t-0" aria-controls="basic-forms-p-0">
                                                    <span class="current-info audible">current step: </span>
                                                    <span class="number"><i class="fa fa-building fa-3x" aria-hidden="true"></i></span> 
                                                  </a>
                                                  
                                              </li>
                                              <li style="width: 50% !important;" role="tab" class="first current" aria-disabled="false" aria-selected="false" align="center">
                                                  <a href="/provider/purchase_orders/lista">
                                                    <span class="number"><i class="fa fa-list fa-3x" aria-hidden="true"></i></span> 
                                                  </a>
                                              </li>
                                            </ul>
                                          </div>
                                          <div class="clearfix" style="margin-top: 50px;">
                                            <fieldset id="basic-forms-p-0" role="tabpanel" aria-labelledby="basic-forms-h-0" class="body current" aria-hidden="false" style="left: 0px;">
                                                <div class="row">	
                                                    <div class="main-body">
                                                        <div class="page-wrapper">
                                                            <!-- Page-header start -->
                                                            <div class="page-header">
                                                                <div class="align-items-end">                                                                  
                                                                  <div class="row">
                                                                      <router-link to="/provider/purchase_orders/create">
                                                                          <button class="btn btn-primary">
                                                                              + Crear Orden
                                                                          </button>
                                                                      </router-link>
                                                                  </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                      <!-- Zero config.table start -->
                                                      <div class="card">  
                                                        <div class="card-block">
                                                            <div class="card-block table-border-style">
                                                                <div class="dt-responsive table-responsive">
                                                                  <table class="table">
                                                                      <thead>
                                                                        <tr>
                                                                          <th>Ordenado por:</th>
                                                                          <th>Fecha orden realizada</th>
                                                                          <th>Proveedor</th>
                                                                          <th>Estado</th>
                                                                          <th>Opciones</th>
                                                                        </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                        <tr data-category="packageone" v-for="(data, index) in searchInUsers">
                                                                          <td >
                                                                            {{data.name}}
                                                                          </td>
                                                                          <td >
                                                                            {{data.purchase_orders_solicited_date}}
                                                                          </td>
                                                                          <td >
                                                                            {{data.providers_name}}
                                                                          </td>
                                                                          <td style="text-align: center;">
                                                                              <span v-if="data.purchase_orders_status==0" style="background: rgb(115, 232, 115);border-radius: 8px;margin: 6px;padding: 5px;">Solicitado</span>
                                                                              <span v-if="data.purchase_orders_status==1" style="background: #ecd324;border-radius: 8px;margin: 6px;padding: 5px;">Confirmado</span>
                                                                              <span v-if="data.purchase_orders_status==2" style="background: #f05a5a;border-radius: 8px;margin: 6px;padding: 5px;">Entregado</span>
                                                                          </td>
                                                                          <td >
                                                                              <a v-if="data.purchase_orders_status==0"  @click="Confirmacion(data.purchase_orders_id)"><button class="btn btn-primary"><i class="fa fa-check"></i></button></a>
                                                                              <a v-if="data.purchase_orders_status==1" @click="Recibido(data.purchase_orders_id)"><button class="btn btn-primary"><i class="fa fa-check"></i></button> </a>
                                                                              <a ><button class="btn btn-warning" @click="EditOrden(data)"><i class="fa fa-pencil"></i></button></a>
                                                                              <a ><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                                                          </td>
                                                                        </tr>
                                                                      </tbody>
                                                                  </table>
                                                                  <div class="card-footer" style="background-color: rgb(0 0 0 / 0%) !important;border-top: 1px solid rgb(255 255 255 / 13%) !important;">
                                                                      <nav aria-label="Page navigation" class="float-left">
                                                                          <ul class="pagination">
                                                                          <!--Botones anteriores-->
                                                                              <li v-if="pagination.currentPage == 1" class="page-item disabled">
                                                                                  <a class="page-link" href="#" aria-label="Previous">
                                                                                      <span aria-hidden="true"><i class="fa fa-fast-backward"></i></span>
                                                                                      <span class="sr-only">Previous</span>
                                                                                  </a>
                                                                              </li>
                                                                              <li v-else class="page-item">
                                                                                  <a class="page-link" href="#" aria-label="Previous" @click.prevent="changePage(1)">
                                                                                      <span aria-hidden="true"><i class="fa fa-fast-backward"></i></span>
                                                                                      <span class="sr-only">Previous</span>
                                                                                  </a>
                                                                              </li>


                                                                              <li v-if="pagination.currentPage == 1" class="page-item disabled">
                                                                                  <a class="page-link" href="#" aria-label="Previous">
                                                                                      <span aria-hidden="true"><i class="fa fa-step-backward"></i></span>
                                                                                      <span class="sr-only">Previous</span>
                                                                                  </a>
                                                                              </li>
                                                                              <li v-else class="page-item">
                                                                                  <a class="page-link" href="#" aria-label="Previous" @click.prevent="changePage(pagination.currentPage - 1)">
                                                                                      <span aria-hidden="true"><i class="fa fa-step-backward"></i></span>
                                                                                      <span class="sr-only">Previous</span>
                                                                                  </a>
                                                                              </li>
                                                                          <!--Botones anteriores-->

                                                                              <li v-for="(page,index) in getLinksPages" class="page-item" :class="[page === isCurrentPage ? 'active':'' ]">
                                                                                  <span v-if="page === isCurrentPage" class="page-link">{{ page }}</span>
                                                                                  <a v-else class="page-link" href="#" @click.prevent="changePage(page)" >{{page}}</a>
                                                                              </li>

                                                                          <!--Botones posteriores-->
                                                                              <li v-if="pagination.currentPage == pagination.lastPage" class="page-item disabled">
                                                                                  <a class="page-link" href="#" aria-label="Previous">
                                                                                      <span aria-hidden="true"><i class="fa fa-step-forward"></i></span>
                                                                                      <span class="sr-only">Next</span>
                                                                                  </a>
                                                                              </li>
                                                                              <li v-else class="page-item">
                                                                                  <a class="page-link" href="#" aria-label="Next" @click.prevent="changePage(pagination.currentPage + 1)">
                                                                                      <span aria-hidden="true"><i class="fa fa-step-forward"></i></span>
                                                                                      <span class="sr-only">Next</span>
                                                                                  </a>
                                                                              </li>

                                                                              <li v-if="pagination.currentPage == pagination.lastPage" class="page-item disabled">
                                                                                  <a class="page-link" href="#" aria-label="Previous">
                                                                                      <span aria-hidden="true"><i class="fa fa-fast-forward"></i></i></span>
                                                                                      <span class="sr-only">Next</span>
                                                                                  </a>
                                                                              </li>
                                                                              <li v-else class="page-item">
                                                                                  <a class="page-link" href="#" aria-label="Next" @click.prevent="changePage(pagination.lastPage)">
                                                                                      <span aria-hidden="true"><i class="fa fa-fast-forward"></i></i></span>
                                                                                      <span class="sr-only">Next</span>
                                                                                  </a>
                                                                              </li>
                                                                          <!--Botones posteriores-->  
                                                                          </ul>
                                                                      </nav>
                                                                  </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                          </div>
                                      </div>
                                    </section>
                                  </div>
                                </div>
                              </div>
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
        data_purchase_order:[],
        data_order:[],
        purchase_orders_complain:'',
        purchase_orders_id:'',
        modal:0,
        selectPerPage:10,
        search:'',
        pagination:{
          perPage:10,
          total:0,
          currentPage:1,
          from:0,
          to:0,
          lastPage:0,
          currentUsers:[],
          links:[]
        },

      }
  },

  methods:{

      EditOrden(data){
          this.$router.push({
            name: "provider/purchase_orders_edit",
            params:{
                data_purchase_orders: data,
            }
          });
      },

      ShowModal(purchase_orders_id){
          let me=this;
          axios.post('/get_pedidos',{ 'purchase_orders_id':purchase_orders_id }).then(function(response){
                me.data_order = response.data;
                me.purchase_orders_id=purchase_orders_id;
                me.modal=1;
          });
      },

      Cerrar(){
        this.modal=0;
      },
        //Paginacion vue//
        GetPurchaseOrder(){
              let me=this;
              axios.get('/get_purchaseorder').then(function(response){
                me.data_purchase_order = response.data;
          });
        },

        changePage(page){
            this.pagination.perPage=this.selectPerPage;
            this.pagination.currentPage = Number(page);
        },

        onKeySearch(){
            this.changePage(1);
        },
        //End Paginate//

        OK_confirm(purchase_orders_id){
            let me = this;
            axios.post('/post_confirm_order',{ 'purchase_orders_id':purchase_orders_id }).then(function(response){
                var confirm = response.data.status;
                if(confirm){
                    me.GetPurchaseOrder();
                }
            });
        },

        Confirmacion(purchase_orders_id){
          let me = this;
            Swal.fire({
              title: "¿Todo bien con su orden?",
              icon: "warning",
              showCancelButton: true,
              cancelButtonText: "No",
              confirmButtonText: "Si",
            }).then(function(isConfirm) {
              if (isConfirm.value) {
                me.OK_confirm(purchase_orders_id);
                Swal.fire({
                  title: 'Orden Confirmada',
                  icon: 'success'
                });
              } else {
                 me.ShowModal(purchase_orders_id);
              }
            })
        },


        Recibido(purchase_orders_id){
            let me = this;
            axios.post('/post_recibido_order',{ 'purchase_orders_id':purchase_orders_id }).then(function(response){
                var confirm = response.data.status;
                if(confirm){
                    me.GetPurchaseOrder();
                }
            });
        },

        ActualizarPedido(){
            axios.post('/post_pedido', {
                  'purchase_orders_id':this.purchase_orders_id,
                  'purchase_orders_complain':this.purchase_orders_complain,
                  'data_order_details':this.data_order
                }).then(response => {
                        if (response.data.status==='success') {
                            this.modal=0;
                        };
                }).catch(function (error) {
                    console.log(error);
                });
        }
        

  },

  computed:{

      Total_Pedidos:function(){
        var resultado=0.0;
        for(var i=0;i<this.data_order.length;i++){
          resultado= resultado+(this.data_order[i].products_price*this.data_order[i].total_products);
        }
        return resultado;
      },

      getCurrentUsers(){
          this.pagination.from = (this.pagination.currentPage-1)*this.pagination.perPage;
          this.pagination.to = Number(this.pagination.from) + Number(this.pagination.perPage);
          return this.data_purchase_order.slice(this.pagination.from,this.pagination.to);
      },
      getLinksPages(){
        let cant = this.pagination.total / Number(this.pagination.perPage);
        this.pagination.links=[];
        let cumstom_links=[];
        /*obtiene los numeros de todas las paginas*/
        for ( let i=0 ; i <  cant; i++) {
            this.pagination.links.push(i+1);
        }
        this.pagination.lastPage = this.pagination.links.length;
        let start = 0;
        let limit = 5;
        if (this.pagination.currentPage < 3) {
            start = 0;
            return this.pagination.links.slice(start,limit);
        }else if (this.pagination.currentPage >= 3 && this.pagination.currentPage-1+2 < this.pagination.lastPage){
            start=(this.pagination.currentPage-1)-2;
            limit = start+limit;
            return this.pagination.links.slice(start,limit);
        }else{
            if (this.pagination.links.length == 4) {
                start=0;
                limit = start+limit;
                return this.pagination.links.slice(start,limit);    
            }else{
                start=(this.pagination.lastPage-1)-4;
                limit = start+limit;
                return this.pagination.links.slice(start,limit);
            }
        }
                
      },
      isCurrentPage(){
          return this.pagination.currentPage;
      },
      searchInUsers(){
        let me =this;

        /*me.libros.filter(function(libro){ 
          console.log(libro.libro_nombre.toLowerCase());
        });*/
          if (this.search.length > 0){
              this.pagination.from = (this.pagination.currentPage-1)*this.pagination.perPage;
              this.pagination.to = Number(this.pagination.from) + Number(this.pagination.perPage);
              this.pagination.total = me.data_purchase_order.filter((purchase_order) => purchase_order.purchase_orders_id).length;
          }else{
              this.pagination.from = (this.pagination.currentPage-1)*this.pagination.perPage;
              this.pagination.to = Number(this.pagination.from) + Number(this.pagination.perPage);
              this.pagination.total = me.data_purchase_order.length;
          }
          return me.data_purchase_order.filter((purchase_order) => purchase_order.purchase_orders_id).slice(this.pagination.from,this.pagination.to);
      }
  },


  mounted() {
      let self = this
      self.GetPurchaseOrder();
  }

  
};
</script>

<style>
	
.nav-pills.nav-wizard > li {
  position: relative;
  overflow: visible;
  border-right: 15px solid transparent;
  border-left: 15px solid transparent;
}
.nav-pills.nav-wizard > li + li {
  margin-left: 0;
}
.nav-pills.nav-wizard > li:first-child {
  border-left: 0;
}
.nav-pills.nav-wizard > li:first-child a {
  border-radius: 5px 0 0 5px;
}
.nav-pills.nav-wizard > li:last-child {
  border-right: 0;
}
.nav-pills.nav-wizard > li:last-child a {
  border-radius: 0 5px 5px 0;
}
.nav-pills.nav-wizard > li a {
  border-radius: 0;
  background-color: #eee;
}
.nav-pills.nav-wizard > li:not(:last-child) a:after {
  position: absolute;
  content: "";
  top: 0px;
  right: -20px;
  width: 0px;
  height: 0px;
  border-style: solid;
  border-width: 20px 0 20px 20px;
  border-color: transparent transparent transparent #eee;
  z-index: 150;
}
.nav-pills.nav-wizard > li:not(:first-child) a:before {
  position: absolute;
  content: "";
  top: 0px;
  left: -20px;
  width: 0px;
  height: 0px;
  border-style: solid;
  border-width: 20px 0 20px 20px;
  border-color: #eee #eee #eee transparent;
  z-index: 150;
}
.nav-pills.nav-wizard > li:hover:not(:last-child) a:after {
  border-color: transparent transparent transparent #aaa;
}
.nav-pills.nav-wizard > li:hover:not(:first-child) a:before {
  border-color: #aaa #aaa #aaa transparent;
}
.nav-pills.nav-wizard > li:hover a {
  background-color: #aaa;
  color: #fff;
}
.nav-pills.nav-wizard > li.active:not(:last-child) a:after {
  border-color: transparent transparent transparent #428bca;
}
.nav-pills.nav-wizard > li.active:not(:first-child) a:before {
  border-color: #428bca #428bca #428bca transparent;
}
.nav-pills.nav-wizard > li.active a {
  background-color: #428bca;
}

    .permiso.mostrar {
      background-color: rgba(0,0,0,.5);
      opacity: 1;
      visibility: visible;
  	}
  	.permiso {
      align-items: flex-start;
      background-color: #fff;
      display: flex !important;
      height: 100vh;
      justify-content: center;
      left: 0;
      opacity: 0;
      position: fixed;
      top: 0;
      visibility: hidden;
      width: 100%;
      transition: all 0.40s cubic-bezier(0.39, 0.575, 0.565, 1);
      z-index: 5000;
  	}

  	.permiso.mostrar .permiso-content {
        opacity: 1;
        transform: scale(1.1);
        visibility: visible;
    }
    .permiso .permiso-content {
        border-radius: 3px;
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
        margin-top: 50px;
        opacity: 0;
        padding: 4px;
        transform: scale(1);
        transition: all .40s cubic-bezier(0.39, 0.575, 0.565, 1);
        visibility: hidden;
    }


</style>