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
                                Hasil IPD
                            </h3>
                        </div>
                        <div class="block-content">
                            <div class="form-group">
                                <label for="matakuliah">Pilih Matakuliah</label>
                                <select class="form-control" id="matakuliah" name="matakuliah">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                              </div>
                        </div>
                        <div class="block-content">
                            <h5><b>Jumlah Responden</b> / Peserta : <b>30</b> / 31</h4>
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