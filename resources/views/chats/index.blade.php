 <!-- resources/views/chat/index.blade.php -->
 @extends('layouts.app')
 @section('content')
 <div class="container">
     <div class="card">
         <div class="card-header">Chats</div>
         <div class="card-body">
             <chat-view></chat-view>  
             <!-- make sure to remove the chat user data. or encrypt it. better remove it once config us done -->
         </div>
         <div class="card-footer">
         </div>
     </div>
 </div>


 @endsection