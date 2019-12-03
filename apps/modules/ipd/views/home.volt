{% extends 'layout.volt' %}

{% block title %}Home{% endblock %}

{% block styles %}

{% endblock %}

{% block content %}

<h1>WELCOEM TO IPD MODULES</h1>

<form action="{{ url(['for': 'ipd-store']) }}" method="POST">
    <div class="form-group">
        <label class="control-label">Soal</label>
        <input type="text" class="form-control" name="isi">
        <label class="control-label">Soal Inggris</label>
        <input type="text" class="form-control" name="isiInggris">
        <div style="padding-left:50px">
            <input type="hidden" name="bobot[]" value="1">
            <div class="form-group">
                <label for="#" class="control-label">Jawaban</label>
                <input type="text" class="form-control" name="jawaban[]">
            </div>
            <div class="form-group">
                <label for="#" class="control-label">Jawaban Inggris</label>
                <input type="text" class="form-control" name="jawabanInggris[]">
            </div>
            <input type="hidden" name="bobot[]" value="2">
            <div class="form-group">
                <label for="#" class="control-label">Jawaban</label>
                <input type="text" class="form-control" name="jawaban[]">
            </div>
            <div class="form-group">
                <label for="#" class="control-label">Jawaban Inggris</label>
                <input type="text" class="form-control" name="jawabanInggris[]">
            </div>
            <input type="hidden" name="bobot[]" value="3">
            <div class="form-group">
                <label for="#" class="control-label">Jawaban</label>
                <input type="text" class="form-control" name="jawaban[]">
            </div>
            <div class="form-group">
                <label for="#" class="control-label">Jawaban Inggris</label>
                <input type="text" class="form-control" name="jawabanInggris[]">
            </div>
            <input type="hidden" name="bobot[]" value="4">
            <div class="form-group">
                <label for="#" class="control-label">Jawaban</label>
                <input type="text" class="form-control" name="jawaban[]">
            </div>
            <div class="form-group">
                <label for="#" class="control-label">Jawaban Inggris</label>
                <input type="text" class="form-control" name="jawabanInggris[]">
            </div>
        </div>
    </div>
    <button class="btn btn-outline btn-primary col-md-12">Simpan</button>
</form>

{% endblock %}

{% block scripts %}
{% endblock %}