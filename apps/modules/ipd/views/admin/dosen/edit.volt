{% extends "layout/index.volt" %}

{% block additional_styles %}
    <style>
        .bottom-marginless{
            margin-bottom: 0;;
        }

        .bottom-padding-15{
            padding-bottom: 15px;
        }
    </style>

{% endblock %}

{% block navbar %}
    {% include "admin/layout/navbar.volt" %}
{% endblock %}

{% block peran %}Admin{% endblock %}

{% block content %}
                <!-- Page Content -->
                <div class="content" id="vue-app">
                    <!-- Table Sections (.js-table-sections class is initialized in Helpers.tableToolsSections()) -->
                    <h2 class="content-heading bottom-marginless">Tambah Pertanyaan Kuisioner Dosen</h2>
                    <p class="text-danger">*Semua isian wajib diisi!</p>

                    <div class="block">
                        <form action="{{ url(['for':'ipd-admin-dosen-update']) }}" method="post">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">
                                    Pertanyaan Kuisioner Dosen
                                </h3>
                            </div>
                            <div class="block-content bottom-padding-15" >
                                {% for key,item in pertanyaan %}
                                <input type="hidden" name="pertanyaanId" value="{{ key }}">
                                <div class="form-group row">
                                    <div class="col-6">
                                        <div class="form-material floating">
                                            <textarea required class="form-control" id="pertanyaan" name="pertanyaan" rows="3">{{ item['detail'][0]['isi'] }}</textarea>
                                            <label for="pertanyaan">Pertanyaan</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-material floating">
                                            <textarea required class="form-control" id="question" name="question" rows="3">{{ item['detail'][0]['isiInggris'] }}</textarea>
                                            <label for="question">Question</label>
                                        </div>
                                    </div>
                                </div>
                                {% endfor %}
                                
                            </div>
                            <div class="block-header block-header-default">
                                <h3 class="block-title">
                                    Pilihan Jawaban Kuisioner Dosen
                                </h3>
                            </div>
                            <div class="block-content bottom-padding-15">
                                <div class="form-group row" v-for="answer,index in answer_object">
                                    <input type="hidden" name="jawabanId[]" v-model="answer['id']">
                                    <div class="col-md-1">
                                        <div class="form-material">
                                            <input required type="number" class="form-control" id="bobot" v-model="answer['bobot']"  name="bobot[]">
                                            <label for="bobot[0]">Bobot</label>
                                        </div>
                                    </div>
                                    <div class="col-md-10 row" style="padding:0; margin:0">
                                        <div class="col-md-6">
                                            <div class="form-material">
                                                <input required type="text" class="form-control" id="jawaban" v-model="answer['jawaban']" name="jawaban[]">
                                                <label for="jawaban">Jawaban</label>
                                                <div class="form-text text-muted text-right">Isilah pilihan jawaban kuisioner pada kolom ini.</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-material">
                                                <label for="jawaban" class="text-right">Answer</label>
                                                <input required type="text" class="form-control" id="answer" v-model="answer['jawabanInggris']" name="answer[]">
                                                <div class="form-text text-muted text-right">Fill the option of the questionnaire's answer here</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1" v-if="answer_object.length!=1">
                                        <div class="form-material">
                                            <button type="button" v-on:click="deleteAnswer(index)" class="btn btn-danger">
                                                <i class="si si-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="button" v-on:click="addAnswer" class="btn btn-outline-secondary col-md-3">Tambah Opsi Jawaban</button>
                                </div>
                            </div>
                            <div class="col-md-12 row bottom-padding-15">
                                <div class="col-md-6">
                                    <button type="button" onclick="window.location.href=`{{ url(['for':'ipd-admin-dosen-list']) }}`" class="btn btn-outline-secondary col-md-12">Batalkan</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-outline-warning col-md-12">Ubah</button>
                                </div>
                            </div>
                        </form>                            
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

        var vm = new Vue({
            el: '#vue-app',
            data: {
                value_holder:`[{% for item in pertanyaan %}{% for jawaban in item['relation'] %}{{ '{"id":"' ~ jawaban['id'] ~ '","bobot":"'~ jawaban['bobot'] ~ '","jawaban":"' ~ jawaban['jawaban'] ~ '","jawabanInggris":"' ~ jawaban['jawabanInggris'] ~ '"},'}}{% endfor %}{% endfor %}]`,
                answer_object:[
                ],
            },
            created:function(){
              this.answer_object = JSON.parse(this.value_holder.slice(0,-2)+"]");  
            },
            methods:{
                addAnswer:function(){
                    this.answer_object.push({
                        'id':'new',
                        'bobot':(this.answer_object.length+1),
                        'jawaban':'',
                        'jawabanInggris':''
                    });
                },
                async deleteAnswer(id){
                    for(var i=id; i < this.answer_object.length ; ++i){
                        temp = Object.create(this.answer_object[i]);
                        temp['bobot'] = i;
                        await this.answer_object.splice(id,1,temp);
                    }
                    await this.answer_object.splice(id,1);
                }
            }
        });

        $("#sidebar-dosen").addClass("open");
        $("#sidebar-dosen-create").addClass("active");
    </script>
{% endblock %}