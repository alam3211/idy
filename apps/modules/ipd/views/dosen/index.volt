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
                                <label for="matakuliah">Pilih Mata Kuliah</label>
                                <select class="form-control" id="matakuliah" name="matakuliah">
                                    <option value="" selected disabled>-- Pilih Mata Kuliah --</option>
                                    {% for kelas in kelasOptions %}
                                    <option value='{ "id":"{{ kelas["id"] }}","daya_tampung":"{{ kelas["daya_tampung"] }}"}'>{{ kelas['kode_mata_kuliah']}} | {{ kelas['nama_mata_kuliah'] }} | {{ kelas['nama_kelas'] }} | {{ kelas['sks_mata_kuliah'] }} SKS</option>
                                    {% endfor %}
                                </select>
                              </div>
                        </div>
                        <div class="block-content">
                            <h5 id="responden_peserta"><b>Jumlah Responden</b> / Peserta : <b>0</b> / 0</h4>
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
                                        <td id="ipd" class="font-w600">0</td>
                                        <td id="ipmk" class="font-w600">0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                Catatan Kuisoner
                            </h3>
                        </div>
                        <div class="block-content">
                            <table class="js-table-sections table table-bordered">
                                <thead align="center">
                                    <th>Kesan & Pesan</th>
                                </thead>
                                <tbody id="catatan" class="js-table-sections-header" align>
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

        $("#matakuliah").change(function() {
            $('#catatan').empty();
            const matkulVal = $("#matakuliah").val();
            $.ajax({
                url: "{{ url(['for':'ipd-dosen-ipd']) }}",
                method: "POST",
                data: JSON.parse(matkulVal),
                success : function(response){
                    updateView(response.data);
                }
            });
        })
        function updateView(data)
        {
            $('#ipd').text(data.ipd);
            $('#ipmk').text(data.ipmk);
            $('#responden_peserta').html("<b>Jumlah Responden</b> / Peserta : <b>"+data.totalResponden+"</b> / "+data.totalPeserta)
            data.catatan.forEach(kuisoner => {
                $('#catatan').append('<td class="font-w600">'+ kuisoner.catatan + '</td>');
            });
        }
    </script>
{% endblock %}