<center>
    <h1>
        THIS IS ERROR PAGE
        
        <h5>THIS IS A CUSTOMIZE NO PAGE</h5>
<!-- If no $name existed then it will not display the name -> auto not displaying if the
$name variable has no data inside -->
        @isset($name)
            
        <h5 class="text-danger">By {{$name}}</h5>
        @endisset ()
    </h1>
</center>

