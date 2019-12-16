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
                                {% for index,pertanyaan in respond %}
                                <tbody class="js-table-sections-header">
                                    <tr>
                                        <td class="text-center">
                                            <i class="fa fa-angle-right"></i>
                                        </td>
                                        <td class="font-w600">{{ pertanyaan['detail'][0]['isi'] }}</td>
                                        <td class="d-none d-sm-table-cell">
                                            <button class="btn btn-sm btn-outline-warning" data-toggle="click-ripple" onclick="window.location.href=`{{ url(['for': 'ipd-admin-dosen-edit','id': index])  }}`">UBAH</button>
                                            <button class="btn btn-sm btn-outline-danger" data-toggle="click-ripple" onclick="deleteQuestion(`{{ index }}`)">HAPUS</button>
                                        </td>
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
                    <!-- END Table Sections -->
                    <form method="post" action="{{ url(['for': 'ipd-admin-dosen-destroy']) }}" class="hidden" id="submitDeletion">
                        <input type="checkboxes" id="checkedSubmit" name="ids[]">
                    </form>
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

        function deleteQuestion(id){
            swal({
                    title: 'Apakah Anda yakin menghapusnya??',
                    text: "Data akan dihapus dan tidak bisa dikembalikan kembali!",
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText : 'Batal',
                    confirmButtonText: 'Hapus'
                }).then((result) => {
                    if (result.value) {
                        $("#checkedSubmit").val([id]);
                        $("#submitDeletion").submit();
                    }
                });
        }
    </script>
{% endblock %}