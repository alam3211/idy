{% extends 'layout.volt' %}

{% block styles %}

{% endblock %}

{% block content %}

<div class="modal" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">New Idea goes here</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <h3>Author</h3>
                    <div class="form-group">
                        <label class="font-weight-bold">Name</label>
                        <input type="text" class="form-control" placeholder="Enter name" name="author_name">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Email</label>
                        <input type="email" class="form-control" placeholder="Enter email" name="author_email">
                    </div>
                    <h3>Idea</h3>
                    <div class="form-group">
                        <label class="font-weight-bold">Title</label>
                        <input type="text" class="form-control" placeholder="Enter title" name="title">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Description</label>
                        <textarea type="text" rows="5" class="form-control" placeholder="Description" name="description"></textarea>
                    </div>
                    <button type="submit" id="addIdeas" class="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
        </div>
</div>

{% endblock %}

{% block scripts %}
<script type="text/javascript">
  $(document).ready(function(){
      $("#addIdeas").submit(function(){
        alert("WORKING");
          $.ajax({
              url: "idea/add",
              type:'POST',
              success: function(data) {
                  alert("MANTAP");
              }
          });     
      });
  });
</script>
{% endblock %}