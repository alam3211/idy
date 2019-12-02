{% extends 'layout.volt' %}

{% block title %}Add New Idea{% endblock %}

{% block styles %}

{% endblock %}

{% block content %}

<h1>THIS IS ADD PAGE</h1>
<form method="POST" action="{{ url('idea/new') }}">
    <div class="form-group">
        <label class="font-weight-bold">Name</label>
        <input type="text" class="form-control" placeholder="Enter name" name="authorName">
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Email</label>
        <input type="email" class="form-control" placeholder="Enter email" name="authorEmail">
    </div>
    <h3>Idea</h3>
    <div class="form-group">
        <label class="font-weight-bold">Title</label>
        <input type="text" class="form-control" placeholder="Enter title" name="ideaTitle">
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Description</label>
        <textarea type="text" rows="5" class="form-control" placeholder="Description" name="ideaDescription"></textarea>
    </div>
    <button class="btn btn-primary" type="submit">SUBMIT</button>
</form>
{% endblock %}

{% block scripts %}

{% endblock %}