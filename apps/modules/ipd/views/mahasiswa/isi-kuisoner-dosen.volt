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
                                {{ detail[0]['nama_kelas']}} <b>{{ detail[0]['kode_kelas']}}</b> <br>
                                {{ detail[0]['nama_dosen']}}
                            </h3>
                        </div>
                        <div class="block-content">
                            <form action="{{ url(['for': 'submit-kuisoner-dosen']) }}" method="post">
                                {% for key, p in pertanyaan %}
                                <div class="form-group">
                                    <input type="hidden" name="kelas" value="{{detail[0]['kelas_id']}}">
                                    <input type="hidden" name="pertanyaan[]" value="{{p['detail'][0]['id']}}">
                                    <label for="exampleFormControlSelect1"> {{index}}. {{p['detail'][0]['isi']}}</label><br>
                                    <label for="exampleFormControlSelect1"><i>{{index}}. {{p['detail'][0]['isiInggris']}}</i></label><br>
                                    {% for key, r in p['relation'] %}
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban[{{index-1}}]" value="{{r['id']}}|{{r['bobot']}}" checked>
                                        <label class="form-check-label" checked="checked">{{r['jawaban']}}</label> |
                                        <label class="form-check-label"><i>{{r['jawabanInggris']}}</i></label>
                                    </div>
                                    {% endfor %}
                                    <?php $index++ ?>
                                </div>
                                {% endfor %}
                                <label class="form-check-label"><i>Catatan:</i></label><br>
                                <textarea name="catatan" cols="30" rows="6"></textarea><br>
                                <button class="btn btn-success" type="submit">Submit</button>
                            </form>
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