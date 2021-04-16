<style>

.btn{
	height:100px;
    width:100px;
	color: #ffffff;
	background-color: #aec533;
	border-color: #aec533;
}
.btn-outline-primary{
	color: #ffffff;
}

.btn:hover{
	font-size: 150%;
	background-color: #5f6e3c;
}

.card{
	background-color: #cdd5c4;
	color: #cdd5c4;
}

.row{
	padding:100px;
}

</style>




<div class="container-fluid">	
		<div class="col-lg-12" style = "padding:100px;" >
			<div class="row">
				<div class="card">
					<div class="card-body">
						<button type="button" class="btn btn-outline-primary">Table 1</button>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<button type="button" id = "button" class="btn btn-outline-primary">Table 2</button>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<button type="button" id = "button" class="btn btn-outline-primary">Table 3</button>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<button type="button" id = "button" class="btn btn-outline-primary">Table 4</button>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<button type="button" id = "button" class="btn btn-outline-primary">Table 5</button>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<button type="button" id = "button" class="btn btn-outline-primary">Table 6</button>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<button type="button" id = "button" class="btn btn-outline-primary">Table 7</button>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<button type="button" id = "button" class="btn btn-outline-primary">Table 8</button>
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<button type="button" id = "button" class="btn btn-outline-primary">Table 9</button>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<button type="button" id = "button" class="btn btn-outline-primary">Table 10</button>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<button type="button" id = "button" class="btn btn-outline-primary">Table 11</button>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<button type="button" id = "button" class="btn btn-outline-primary">Table 12</button>
					</div>
				</div>
			</div>
		</div>	
</div>

<script>

var button = document.getElementById("button");

button.onclick = function() {
  button.style.background = "green";  
}

</script>