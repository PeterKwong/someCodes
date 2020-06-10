@extends('backEnd.app')


  @section('content')

        <div id="starredDiamondsExport">
            <div class="level"> 
                <p class="title is-4">
                  Export Starred Diamonds <strong style="color: #0000ff"> </strong>
                </p>
            </div>
            <div class="columns">
                <div class="column">
                </div>

                <div class="column is-6">
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
