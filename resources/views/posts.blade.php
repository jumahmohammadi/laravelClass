<div>
    <h1> {{$page_title}}</h1>
	<table border="1">
  <tr>
    <th>ID</th>
    <th>title</th>
    <th>operation</th>
  </tr>
  
  @php $counter=1; @endphp
  
  
  @foreach($posts as $post)
  <tr>
    <td> {{$counter++}}</td>
    <td>{{$post}}</td>
    <td><button>Delete</button>/<button>Edit</button></td>
  </tr>
  @endforeach
  
</table>
</div>
