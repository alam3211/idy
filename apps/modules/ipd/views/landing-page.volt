{% extends "layout/index.volt" %}

{% block additional_styles %}
    <style>

    </style>

{% endblock %}

{% block peran %}Undefined{% endblock %}

{% block content %}
    <div class="content">
            <h2 class="content-heading">Authentication <small>Original Design</small></h2>
            <div class="row">
                <div class="col-md-4">
                    <!-- Sign In -->
                    <a class="block block-link-shadow" href="op_auth_signin.html">
                        <div class="block-content text-center">
                            <div class="py-20">
                                <p class="mb-10">
                                    <i class="si si-login font-size-h1 text-info"></i>
                                </p>
                                <p class="font-size-lg">Admin<p>
                            </div>
                        </div>
                    </a>
                    <!-- END Sign In -->
                </div>
                <div class="col-md-4">
                    <!-- Register -->
                    <a class="block block-link-shadow" href="op_auth_signup.html">
                        <div class="block-content text-center">
                            <div class="py-20">
                                <p class="mb-10">
                                        <i class="si si-login font-size-h1 text-info"></i>
                                </p>
                                <p class="font-size-lg">Dosen<p>
                            </div>
                        </div>
                    </a>
                    <!-- END Register -->
                </div>
                <div class="col-md-4">
                    <!-- Password Reminder -->
                    <a class="block block-link-shadow" href="op_auth_reminder.html">
                        <div class="block-content text-center">
                            <div class="py-20">
                                <p class="mb-10">
                                    <i class="si si-login font-size-h1 text-info"></i>
                                </p>
                                <p class="font-size-lg">User<p>
                            </div>
                        </div>
                    </a>
                    <!-- END Password Reminder -->
                </div>
                
            </div>
    </div>
{% endblock %}

{% block additional_scripts %}
    <script>
        jQuery(function () {
            Codebase.helpers('table-tools');
        });
    </script>
{% endblock %}