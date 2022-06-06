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
                                        <h4>COLORES</h4>
                                    </div>
                            	</div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                    <router-link to="/color/create">
										<button class="btn btn-primary">
											+ Nuevo Color
										</button>
									</router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->

                    <!-- Page-body start -->
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Zero config.table start -->
                                <div class="card">
                                    <div class="card-block">
                                        <div class="card-block table-border-style">
                                            <div class="dt-responsive table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombre</th>
                                                            <th>Color</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="data in getCurrentUsers" :key="data.collections_id">
                                                            <td >
                                                                {{data.color_name}}
                                                            </td>
                                                            <td>
                                                                {{ data.color_code }}
                                                            </td>
                                                            <td>															
                                                                <a @click="Destroy(data.color_id)">
                                                                    <button class="btn btn-danger"> <i class="feather icon-trash"></i></button>
                                                                </a>															
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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
            data_color:[],

            selectPerPage:10,
            search:"",
            pagination:{
                perPage:100,
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
	    Destroy(id){
            axios.post('/destroy_color/' + id).then(function(r) {
                window.location.reload();
            });
	    },

        GetColors(){
            let me=this;
            axios.get('/get_colors').then(function(response){
                me.data_color = response.data;
            });
        },

        //Pagination Start//
        changePage(page){
            this.pagination.perPage=this.selectPerPage;
            this.pagination.currentPage = Number(page);
        },

        onKeySearch(){
            this.changePage(1);
        },
        //End Paginate//
    },

    computed: {
        getCurrentUsers(){
            this.pagination.from = (this.pagination.currentPage-1)*this.pagination.perPage;
            this.pagination.to = Number(this.pagination.from) + Number(this.pagination.perPage);
            return this.data_color.slice(this.pagination.from,this.pagination.to);
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
            } else if (this.pagination.currentPage >= 3 && this.pagination.currentPage-1+2 < this.pagination.lastPage){
                start=(this.pagination.currentPage-1)-2;
                limit = start+limit;
                return this.pagination.links.slice(start,limit);
            } else {
                if (this.pagination.links.length == 4) {
                    start=0;
                    limit = start+limit;
                    return this.pagination.links.slice(start,limit);    
                } else {
                    start=(this.pagination.lastPage-1)-4;
                    limit = start+limit;
                    return this.pagination.links.slice(start,limit);
                }
            }
        },

        isCurrentPage() {
            return this.pagination.currentPage;
        },

        searchInUsers(){
            let me =this;

            if (this.search.length > 0) {
                this.pagination.from = (this.pagination.currentPage-1)*this.pagination.perPage;
                this.pagination.to = Number(this.pagination.from) + Number(this.pagination.perPage);
                this.pagination.total = me.data_color.filter((collect) => collect.color_name.toLowerCase().includes(this.search.toLowerCase())).length;
            } else {
                this.pagination.from = (this.pagination.currentPage-1)*this.pagination.perPage;
                this.pagination.to = Number(this.pagination.from) + Number(this.pagination.perPage);
                this.pagination.total = me.data_color.length;
            }
            return me.data_color.filter((collect) => collect.color_name.toLowerCase().includes(this.search.toLowerCase())).slice(this.pagination.from,this.pagination.to);
        }
    },

    mounted() {
        let self = this
        setTimeout(function() {
            self.GetColors();
        }, 2000);
    },
};
</script>