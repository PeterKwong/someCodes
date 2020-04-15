@extends('backEnd.app')


  @section('content')

        <div id="invoiceExport">
            <div class="level"> 
                <p class="title is-4">
                  Export Invoice <strong style="color: #0000ff"> </strong>
                </p>
            </div>
            <div class="columns">
                <div class="column">
                </div>

                <div class="column is-6">
                  <input class="input" type="text" name="text" v-model="form.year">
                  <input class="input" type="text" name="text" v-model="form.month">
                  <button class="button is-primary" @click="fetchData()">Generate</button>
                </div>

                <div class="column">
                </div>                
            </div>


            <br>
            <br>
            <br>

    </div>


  @endSection
