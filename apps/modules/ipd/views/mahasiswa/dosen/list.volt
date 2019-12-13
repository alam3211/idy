{% extends "layout/index.volt" %}

{% block additional_styles %}
    <style>
        .hidden{
            display:none;
        }
    </style>

{% endblock %}

{% block navbar %}
    {% include "admin/layout/navbar.volt" %}
{% endblock %}

{% block peran %}Admin{% endblock %}

{% block content %}
                <!-- Page Content -->
                <div class="content">
                    {{ flashSession.output() }}
                    <!-- Table Sections (.js-table-sections class is initialized in Helpers.tableToolsSections()) -->
                    <h2 class="content-heading">Dosen</h2>
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                Daftar Dosen Informatika ITS
                            </h3>
                        </div>
                        <div class="block-content">
                            <table class="js-table-sections table table-hover">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                    </tr>
                                </thead>
                                <tbody class="js-table-sections-header">
                                {% for dosen in respond %}    
                                    <tr>
                                        <td class="font-w600">{{ dosen['nik'] }}</td>
                                        <td class="font-w600">{{ dosen['nama'] }}</td>
                                    </tr>
                                {% endfor %}
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