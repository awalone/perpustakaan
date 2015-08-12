<script>
$(document).ready(function(){
   $(".announce").click(function(){ // Click to only happen on announce links
     $("#cafeId").val($(this).data('id'));
     $('#createFormId').modal('show');
   });
});
</script>


<div class="modal hide fade" id="createFormId">
<div class="modal-header">
    <a href="#" class="close" data-dismiss="modal">&times;</a>
    <h3>Create Announcement</h3>
</div>
<div class="modal-body">
    <form class="form-horizontal" method="POST" action="/announce" >
        <input type="hidden" name="cafeId" value="104" />
        <fieldset>
            <div class="control-group">
                <label class="control-label" for="cafeName">Where I am Coding</label>
                <div class="controls">
                    <input id="cafeName" name="cafeName" class="input-xlarge disabled" type="text" readonly="readonly" type="text" value="B&amp;Js"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="date">Date</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" id="date" name="date" />
                    <p class="help-block"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="submit" class="btn btn-primary" value="create" />
                    <input type="button" class="btn" value="Cancel" onclick="closeDialog ();" />
                </div>
            </div>
        </fieldset>
    </form>
    
    
     <table class="table table-condensed  table-striped">
      <tbody>   
        <tr>
          <td>B&Js
          </td>
          <td>10690 N De Anza Blvd </td>
          <td>
              <a class="btn btn-primary" data-toggle="modal" onClick="$('#createFormId').modal('show')" >Announce</a>
          </td>
        </tr>

        <tr>
          <td>CoHo Cafe
          </td>
          <td>459 Lagunita Dr </td>
          <td>
              <a class="btn btn-primary" data-toggle="modal" onClick="$('#createFormId').modal('show')" >Announce</a>
          </td>
        </tr>


        <tr>
          <td>Hot Spot Espresso and Cafe
          </td>
          <td>1631 N Capitol Ave </td>
          <td>
              <a class="btn btn-primary" data-toggle="modal" onClick="$('#createFormId').modal('show')" >Announce</a>
          </td>
        </tr>

      </tbody>
    </table>
    
</div>