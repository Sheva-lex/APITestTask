<template>
    <div class="container">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-header py-3 text-white bg-primary border-primary">
                    <h8 class="my-0 fw-normal">{{ product.name }}</h8>
                </div>
                <div class="d-flex justify-content-center mt-4 w-100">
                    <img :src="product.image" class="w-75">
                </div>
                <div class="card-body">
                    <p class="card-text">{{ product.description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group text-muted">
                            Ціна: {{ product.price }} грн.
                        </div>
                        <small class="text-muted">{{ product.created_at }}</small>
                    </div>
                </div>
            </div>
            <div class="alert alert-danger" role="alert" v-if="errored">
                Помилка загрузки продукта!
            </div>
            <div class="text-center" v-if="loading">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        id: {
            required: true,
            type: String
        }
    },
    data() {
        return {
            product: null,
            errored: false,
            loading: true
        }
    },
    mounted() {
        axios.get('/api/v1/products/' + this.id)
            .then(response => {
                this.product = response.data.data
            })
            .catch(error => {
                console.log(error)
                this.errored = true
            })
            .finally(() => {
                this.loading = false
            })
    }
}
</script>

