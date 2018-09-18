<template>
    <div :class="{ 'modal fade': modal_mode }" :id="id" tabindex="-1" role="dialog" aria-labelledby="modalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <button v-if="modal_mode" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="color-main-blue">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div>
                        <div class="form-group">
                            <input type="email" v-model="data.email" :placeholder="ph_email" class="form-control intita-input"
                                   name="email" required autofocus>
                            <div class="text-danger" v-if="errors.email">
                                {{errors.email[0]}}
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" v-model="data.password" :placeholder="ph_password"
                                   class="form-control intita-input" name="password" required>
                            <div class="text-danger" v-if="errors.password">
                                {{errors.password[0]}}
                            </div>
                        </div>
                        <div v-show="signInMode">
                            <div class="d-flex justify-content-between">
                                <div>
                                    .
                                </div>
                                <div>
                                    .
                                </div>
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button type="submit" class="btn-auth-form" @click="login()">
                                    {{ login_button }}
                                </button>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a data-toggle="modal" data-target="#forgotPasswordModal" href="">{{ forgot_pass_title }}</a>
                                </div>
                                <div>
                                    <a @click="toggleAuthMode" href="javascript:void(0)">{{ registration_title }}</a>
                                </div>
                            </div>
                        </div>
                        <div v-show="!signInMode">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="fullRegistration" value="1">
                                        <label class="form-check-label" for="fullRegistration">{{full_registration_title}}</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="onlineCheckbox" disabled>
                                        <label class="form-check-label" for="onlineCheckbox">онлайн</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" v-model="offlineForm" id="offlineCheckbox">
                                        <label class="form-check-label" for="offlineCheckbox">офлайн</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button type="submit" class="btn-auth-form" @click="register()">
                                    {{ registration_button }}
                                </button>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div></div>
                                <div>
                                    <a v-show="!signInMode" @click="toggleAuthMode" href="javascript:void(0)">{{ login_title }}</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="text-center">
                        {{network_title}}
                        <div class="networks">
                            <img :src="facebook_svg">
                            <img :src="google_svg">
                            <img :src="in_svg">
                            <img :src="twitter_svg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['modal_mode', 'login_url', 'register_url', 'id', 'signIn', 'ph_email', 'ph_password', 'login_button', 'registration_button',
            'forgot_pass_title', 'registration_title', 'login_title', 'network_title', 'full_registration_title',
            'facebook_svg', 'google_svg', 'in_svg', 'twitter_svg'],
        data: function () {
            return {
                data:{},
                signInMode: true,
                offlineForm:false,
                errors:{}
            }
        },
        mounted() {
            if(!this.signIn) this.signInMode = false;
        },
        watch: {
            offlineForm: function (newValue, oldValue) {
                if(this.offlineForm){
                    this.data.educform = 3;
                    this.data.education_shift = 3;
                }else{
                    this.data.educform = 1;
                }
            },
        },
        methods:{
            toggleAuthMode: function () {
                this.signInMode = !this.signInMode;
            },
            login: function () {
                var that = this;
                axios.post(that.login_url, that.data)
                    .then(function (response) {
                        response.data.url == 'current' ? window.location.reload() : window.location.href = response.data.url;
                    })
                    .catch(function (error) {
                        that.errorParser(error);
                    });
            },
            register: function () {
                var that = this;
                axios.post(that.register_url, that.data)
                    .then(function (response) {
                        window.location.href = "confirmation";
                    })
                    .catch(function (error) {
                        that.errorParser(error);
                    });
            },
            errorParser: function (error) {
                var that = this;
                if(error.response.status === 422){
                    that.errors = error.response.data.errors
                }else{
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

    .networks img {
        cursor: pointer;
        padding: 2px;
        width: 75px;
        height: 75px;
        opacity: 0.75;
    }

    .networks img:hover {
        opacity: 1;
    }
</style>
