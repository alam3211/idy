{% extends "layout/index.volt" %}

{% block additional_styles %}
    <style>
        .hidden{
            display:none;
        }
    </style>

{% endblock %}

{% block navbar %}
    {% include "dosen/layout/navbar.volt" %}
{% endblock %}

{% block peran %}Dosen{% endblock %}

{% block content %}
                <!-- Page Content -->
                <div class="content">
                    {{ flashSession.output() }}
                    <!-- Table Sections (.js-table-sections class is initialized in Helpers.tableToolsSections()) -->
                    <h2 class="content-heading">Kuisioner / {{ title }}</h2>
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                Daftar Pertanyaan Kuisioner {{ title }}
                            </h3>
                        </div>
                        <div class="block-content">
                            <table class="js-table-sections table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 30px;"></th>
                                        <th>Pertanyaan</th>
                                    </tr>
                                </thead>
                                {% for index,pertanyaan in respond %}
                                <tbody class="js-table-sections-header">
                                    <tr>
                                        <td class="text-center">
                                            <i class="fa fa-angle-right"></i>
                                        </td>
                                        <td class="font-w600">{{ pertanyaan['detail'][0]['isi'] }}</td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    {% for jawaban in pertanyaan['relation'] %}
                                    <tr>
                                        <td class="text-center"></td>
                                        <td class="font-w600 text-success">{{ jawaban['bobot']~") "~ jawaban['jawaban'] }}</td>
                                        <td class="d-none d-sm-table-cell"></td>
                                    </tr>
                                    {% endfor %}
                                </tbody>
                                {% endfor %}
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
{% endblock %}

{% block additional_scripts %}
    <script>
        jQuery(function () {
            Codebase.helpers('table-tools');
        });

        $("#sidebar-dosen").addClass("open");
        $("#sidebar-dosen-list").addClass("active");
    </script>
{% endblock %}