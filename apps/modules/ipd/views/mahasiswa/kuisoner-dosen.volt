{% extends "layout/index.volt" %}

{% block additional_styles %}
    <style>
        .hidden{
            display:none;
        }
    </style>

{% endblock %}

{% block navbar %}
    {% include "mahasiswa/layout/navbar.volt" %}
{% endblock %}

{% block peran %}Admin{% endblock %}

{% block content %}
                <!-- Page Content -->
                <div class="content">
                    {{ flashSession.output() }}
                    <!-- Table Sections (.js-table-sections class is initialized in Helpers.tableToolsSections()) -->
                    <h2 class="content-heading">Kuisoner Dosen</h2>
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                Daftar Kuisoner Dosen
                            </h3>
                        </div>
                        <div class="block-content">
                            <table class="js-table-sections table table-hover">
                                <thead>
                                    <tr>
                                        <th>Kelas</th>
                                        <th>Dosen Pengampu</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="js-table-sections-header">
                                {% for kuisoner in respond %}    
                                    <tr>
                                        <td class="font-w600">{{ kuisoner['mata_kuliah'] }} {{ kuisoner['nama'] }}</td>
                                        <td class="font-w600">{{ kuisoner['nama_dosen'] }}</td>
                                        <td class="font-w600">{{kuisoner['id_kuisoner']==null?'Belum Diisi':'Sudah Diisi'}}</td>
                                        <td class="font-w600">
                                            {% if kuisoner['id_kuisoner']==null %}
                                            <form action="{{url('/ipd/mahasiswa/isi-kuisoner-dosen')}}/{{kuisoner['id_kelas']}}" method="get">
                                                <button type="submit" class="btn btn-sm btn-primary" href="google.com">Isi Kuisoner</button>
                                            </form>
                                            {% endif %}
                                        </td>
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