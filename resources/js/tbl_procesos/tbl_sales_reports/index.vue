<template>

	<main id="tg-main" class="tg-main tg-haslayout" style="background: rgb(219, 219, 219);">
		<section class="tg-dbsectionspace tg-haslayout tg-statistics">
				<div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
						<div class="tg-dashboardbox tg-statistic">
							<figure>
                                <i class="fa fa-usd fa-3x"></i>
                            </figure>
							<div class="tg-contentbox">
                                <h3>$ 231231232</h3><br>
								<span style="font-size: 30px;"></span>							
								<a class="tg-btnviewdetail" href="javascript:void(0);" style="left: 15px !important;">
                                    Total de Ventas
                                </a>
							</div>
						</div>
					</div>
					
				</div>
		</section>
		<section class="tg-dbsectionspace tg-haslayout">
	      <div class="row">
				<div class="col-md-6">
					<select class="form-control">
						<option ></option>
					</select>
				</div>
				<div class="col-md-3">
					<button class="btn btn-primary" @click="searchProducts()"><i class="fa fa-search"></i> Buscar</button>
				</div>
				
	      </div>
			<br>
		  <div class="row">
			  <div class="col-md-6">
				  				
				</div>
		  </div>
		</section>
		<section class="tg-dbsectionspace tg-haslayout" >
	      <div class="row">
				<div class="tg-formtheme tg-formdashboard">
					<fieldset>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-dashboardbox">
							<div class="tg-dashboardholder">
								<div class="row">
									<div class="col-lg-4">
										<div class="form-group ">
											<label>Tipo de Pedido</label>
												<select class="form-control">
													<option >Entregados</option>
													<option >Anulados</option>
													<option >Despachados</option>
													<option >No Despachados</option>
												</select>
										</div>	
									</div>
									<table id="tg-adstype" class="table tg-dashboardtable tg-payments">
									<thead>
										<tr>
											<th style="width: 18%;">Imagen</th>
											<th>Nombre</th>
											<th>Categoria</th>
											<th>Material</th>
											<th>Coleccion</th>
											<th>Tamaño</th>
										</tr>
									</thead>
									<tbody>
										<tr data-category="packageone" v-for="(data, index) in searchInUsers">
											<td>
												<img :src="data.inventories_image_url ? '/img_inventories/'+data.inventories_image_url : '/img/logo.jpeg'" style="width: 70%;">
											</td>
											<td data-title="Nombre">
												<h3>{{data.products_name}}</h3>
											</td>
											<td>
												<h3>{{data.category.categories_name }}</h3>
											</td>
											<td>
												<h3>{{data.material.materials_name}}</h3>
											</td>
											<td>
												<h3>{{data.collection.collections_name}}</h3>
											</td>
											<td>
												{{data.sizes ? data.sizes.medidas: 'No tiene medidas'  }}
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
					</fieldset>
				</div>
	      </div>
		</section>
	</main>
	
</template>


<script>

export default {

  data:function(){
      return {
      	datas_sales_details:[],
		products_name:'',
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

		//Pagination//
        GetProductos(){
              let me=this;
			  Swal.fire({
                	title: 'Cargando...',
                  allowEscapeKey: false,
                  allowOutsideClick: false,
                  onOpen: () => {
                  swal.showLoading();
                  }
            	});
              axios.get('/get_products').then(function(response){
                me.data_products = response.data;
				swal.close();
                console.log(me.data_products);
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

        
		searchProducts(){
          let me=this;
          axios.get('/products/search_products',{
			 'products_name': me.products_name
		}).then(function(response){              
			  if (response.data.length) {
				  me.data_products=response.data;
			  }else{
				Swal.fire({
                    text: 'Producto no encontrado',
                    type: 'success',
                    confirmButtonText: 'OK'
                });
			  }
          })
		},
		
		editProducto(data){
			this.$router.push({
				name: "products/edit",
				params:{
					data_product: data
				}
			});
		}

  },

  computed:{
		getCurrentUsers(){
			this.pagination.from = (this.pagination.currentPage-1)*this.pagination.perPage;
			this.pagination.to = Number(this.pagination.from) + Number(this.pagination.perPage);
			return this.data_products.slice(this.pagination.from,this.pagination.to);
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

			me.data_products.filter(function(element){ 
				console.log(element.products_name.toLowerCase());
			});
			/* if (this.search.length > 0){
				this.pagination.from = (this.pagination.currentPage-1)*this.pagination.perPage;
				this.pagination.to = Number(this.pagination.from) + Number(this.pagination.perPage);
				this.pagination.total = me.data_products.filter((prod) => prod.products_name.toLowerCase().includes(this.search.toLowerCase())).length;
			}else{
				this.pagination.from = (this.pagination.currentPage-1)*this.pagination.perPage;
				this.pagination.to = Number(this.pagination.from) + Number(this.pagination.perPage);
				this.pagination.total = me.data_products.length;
			}
			return me.data_products.filter((prod) => prod.products_name.toLowerCase().includes(this.search.toLowerCase())).slice(this.pagination.from,this.pagination.to);
	 */	}
	},

   mounted() {
            let self = this
            setTimeout(function(){
              self.GetProductos();
            },2000);

  }

  
};
</script>