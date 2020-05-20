@extends('backEnd.app')


  @section('content')

    <div id="diamondForm">

    	<div class="box">


			<div class="columns">
				<p class="title is-5 is-primary">Title for post</p>
			</div>
			<select v-model="form.supplier">
				<option v-for="supplier in suppliers">@{{supplier.name}}</option>
			</select>

			<div class="columns" >
					<div class="column is-4" >
							<div class="box">
								<label >@{{form.csv}}</label>
								<input type="file" accept="files/*" class="input" name="csv" @change="upload">
								<small v-if="error.name">@{{error.name[0]}}</small>
							</div>

						</div>
					

			</div>



			<div class="columns is-centered">
					<div class="column">
						<button class="button is-primary" @click="saveFromAPI" :disabled="isProcessing">From API</button>
					</div>
					<div class="column">
						<button class="button is-primary" @click="saveFromRap" >From Rap</button>
					</div>
			</div>



			<div class="columns is-centered">
					<div class="column">
						<button class="button is-primary" @click="disableDiamonds" >Disable All Diamonds</button>
					</div>
			</div>


			<div class="columns is-centered">
					<div class="column">
						<button class="button is-primary" @click="test" >test</button>
					</div>
			</div>

			<div>
			<p>Status : @{{CalTotalPage}}</p>
			<p>Reading on Page : @{{onPage}}</p>
			<p>Reading on lot : @{{onLot}} /@{{lot}}</p>

			</div>

		</div>

    </div>


  @endSection
