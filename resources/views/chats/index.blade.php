 <!-- resources/views/chat/index.blade.php -->
 @extends('layouts.app')
 @section('content')
 <div class="container">
     <div class="card">
         <div class="card-header">Chats</div>
         <div class="card-body">
             <chat-messages :all-messages="messages"></chat-messages>
         </div>
         <div class="card-footer">
             <chat-form @messagesent="addMessage()" :user="{{ Auth::user() }}"></chat-form>
         </div>
     </div>
 </div>


 @endsection