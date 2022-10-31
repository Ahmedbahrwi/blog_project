@extends('layout')
<form method="POST" action="{{ route('comment.post') }}"> 
@csrf
</div>
  <div class="form-group">
    <label for="comment_description">Comment</label>
    <textarea class="form-control" id="comment_description" rows="3" name="comment_description"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>