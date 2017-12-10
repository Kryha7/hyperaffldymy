@extends('layouts.beast')
@section('content')
<div class="container">
    <h1>Help</h1>
    <div class="about">
    	<h2>About us</h2>
    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis explicabo veritatis unde obcaecati dolorum iure cum veniam ipsa vitae ea doloremque enim illo nostrum sit, dignissimos deserunt saepe ullam quidem? Placeat, distinctio, iste, dolore praesentium nulla voluptatibus commodi mollitia alias earum sit modi incidunt accusamus veniam laudantium sunt eos molestias quas delectus numquam asperiores soluta ex. Obcaecati ab eaque voluptatum!</p>
    </div>
	<div class="questions">
		<div class="question">
			<div class="question-header" id="q1"><h2>When does the raffle end?</h2></div>
			<div class="answer hidden" id="a1">
				<p>Each raffle ends with reaching the full pool of tickets.</p>
			</div>
		</div>
		<div class="question">
			<div class="question-header" id="q1"><h2>All are items legit?</h2></div>
			<div class="answer hidden" id="a2">
				<p>So all items are legit, random items are in <b>ds</b> or in the worst case <b>vnds</b>.</p>
			</div>
		</div>
		<div class="question">
			<div class="question-header" id="q1"><h2>How fast will I get the winning item?</h2></div>
			<div class="answer hidden" id="a3">
				<p>The raffle is carried out immediately after the ticket pool is filled. Information about the winnings will be displayed on the main page when logging in to the account. You are touting the email with information about the winning and asking and providing the address for sending the item. You can see all the winners <a href="{{url('/archive')}}">at this link</a>.</p>
			</div>
		</div>
		<div class="question">
			<div class="question-header" id="q1"><h2>Tickets bought are refundable?</h2></div>
			<div class="answer hidden" id="a4">
				<p>The purchased tickets are not refundable. Tickets can be used only to take a stroke in raffles.</p>
			</div>
		</div>
	</div>
</div>
@endsection