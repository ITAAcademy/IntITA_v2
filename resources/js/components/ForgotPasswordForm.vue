<template>
    <div :class="{ 'modal fade': modal_mode }" :id="id" tabindex="-1" role="dialog"
         aria-labelledby="forgotPasswordTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <button v-if="modal_mode" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="color-main-blue">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div>
                        <div class="text-center">
                            <h1>{{title}}</h1>
                        </div>
                        <p>
                            {{description}}
                        </p>
                        <div class="form-group">
                            <input type="email" v-model="data.email" :placeholder="ph_email"
                                   class="form-control intita-input"
                                   required autofocus>
                            <div class="text-danger" v-if="errors.email">
                                {{errors.email[0]}}
                            </div>
                            <div class="text-danger" v-if="error">
                                {{error}}
                            </div>
                        </div>
                        <div class="form-group mb-0 text-center">
                            <button type="submit" class="btn-auth-form" @click="send()">
                                {{ btn_title }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['modal_mode', 'forgot_password_url', 'id', 'ph_email', 'btn_title', 'description', 'title'],
        data: function () {
            return {
                data: {},
                error: '',
                errors: {}
            }
        },
        methods: {
            send: function () {
                axios.post(this.forgot_password_url, this.data)
                    .then((response) => {
                        window.location.href = "reset";
                    })
                    .catch((error) => {
                        this.errorParser(error);
                    });
            },
            errorParser: function (error) {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors
                    this.error = '';
                } else if (error.response.status === 400) {
                    this.errors = {};
                    this.error = error.response.data.errors
                } else {
                    alert('Виникла помилка');
                    console.log(error);
                }
            }
        }
    }
</script>
<style scoped>
    .btn-auth-form {
        width: 195px;
        height: 52px;
        border-radius: 10px;
        border: none;
        border-top: 1px solid #9fb5ce;
        color: #ffffff;
        background: #4b75a4;
        box-shadow: 0px 2px 0px #7f7f7f;
        font: normal 400 28px/50px "MyriadPro2";
        font-size: 25px;
        text-shadow: 1px 2px 1px rgba(0, 0, 0, .5);
    }

    .btn-auth-form:hover {
        background: #454545;
        box-shadow: 0px 2px 0px #7f7f7f;
        cursor: pointer;
    }
</style>
