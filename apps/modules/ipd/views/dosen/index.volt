{% extends "layout/index.volt" %}

{% block additional_styles %}
    <style>
        .bottom-marginless{
            margin-bottom: 0;;
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
                    <h2 class="content-heading">IPD / Hasil IPD</h2>
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                <b>Jumlah Responden</b> / Peserta : <b>30</b> / 31
                            </h3>
                        </div>
                        <div class="block-content">
                            <table class="js-table-sections table table-bordered">
                                <thead align="center">
                                    <tr>
                                        <th colspan="2" style="border:1px solid #e4e7ed">Nilai</th>
                                    </tr>
                                    <tr>
                                        <th>IPMK</th>
                                        <th>IPDO</th>
                                    </tr>
                                </thead>
                                <tbody class="js-table-sections-header" align="center">
                                    <tr>
                                        <td class="font-w600">3.40</td>
                                        <td class="font-w600">3.99</td>
                                    </tr>
                                </tbody>
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
    </script>
{% endblock %}