{% extends "layout/index.volt" %}

{% block additional_styles %}
    <style>

    </style>

{% endblock %}

{% block navbar %}
    {% include "admin/layout/navbar.volt" %}
{% endblock %}

{% block peran %}Admin{% endblock %}

{% block content %}
                <!-- Page Content -->
                <div class="content">
                    <!-- Table Sections (.js-table-sections class is initialized in Helpers.tableToolsSections()) -->
                    <h2 class="content-heading">Dosen</h2>
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                Daftar Pertanyaan Kuisioner Dosen
                            </h3>
                        </div>
                        <div class="block-content">
                            <table class="js-table-sections table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 30px;"></th>
                                        <th>Pertanyaan</th>
                                        <th class="d-none d-sm-table-cell" style="width: 20%;">Aksi</th>
                                    </tr>
                                </thead>
                                {% for pertanyaan in respond %}
                                {{ pertanyaan }}
                                <tbody class="js-table-sections-header show table-active">
                                    <tr>
                                        <td class="text-center">
                                            <i class="fa fa-angle-right"></i>
                                        </td>
                                        <td class="font-w600">{{ pertanyaan.isi }}</td>
                                        <td class="d-none d-sm-table-cell">
                                            <button onclick="alert('halo')">asdasd</button>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    {% for jawaban in respond.jawaban %}
                                    <tr>
                                        <td class="text-center"></td>
                                        <td class="font-w600 text-success">jawaban.jawaban</td>
                                        <td class="d-none d-sm-table-cell"></td>
                                    </tr>
                                    {% endfor %}
                                </tbody>
                                {% endfor %}
                            </table>
                        </div>
                    </div>
                    <!-- END Table Sections -->
                </div>
                <!-- END Page Content -->
{% endblock %}

{% block additional_scripts %}
    <script>
        jQuery(function () {
            Codebase.helpers('table-tools');
        });
    </script>
{% endblock %}