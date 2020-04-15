@extends('backEnd.app')


  @section('content')

    <div id="diamondDiscPrice">

  <div class="card-box">  
    <h1 class="title is-3">@{{title}}</h1>
    <h1 class="title is-3" v-if="option">Latest ID: @{{option.id}}</h1>
      <form @submit.prevent="save">
      <div class="field" >

        <div class="row">
          <div class="col-2">
            <div class="control has-icon-left">
              <div class="control">
                <label  class="label">Shape</label>
                  <select class="form-control" v-model="form.shape">Round
                        <option value="round">Round</option>
                        <option value="pear">Fancy</option>
                    </select>
              </div>
            </div>
          </div>

 

        <div class="row">

          <div class="col-2">
            <div class="control has-icon-left">
              <div class="control">
                <label  class="label">weight</label>
                  <input type="text" class="form-control" v-model="form.weight" placeholder="carat" required>
              </div>
            </div>
          </div>

          <div class="col-2">
            <div class="control has-icon-left">
              <div class="control">
                <label class="label">color</label>
                  <input type="text" class="form-control" v-model="form.color" required>
              </div>
            </div>
          </div>

          <div class="col-2">
            <div class="control has-icon-left">
              <div class="control">
                <label class="label">clarity</label>
                  <input type="text" class="form-control" v-model="form.clarity" required>
              </div>
            </div>
          </div>
          <div class="col-2">
            <div class="control ">
              <div class="control">
                <label class="label">discount</label>
                  <input type="text" class="form-control" v-model="form.discount" required>
                  <small class="is-danger" v-if="errors.sideStone">@{{errors.sideStone[0]}}</small>
              </div>
            </div>
          </div>

          <div class="col-2">
            <div class="control ">
              <div class="control">
                <label class="label">GIA Number 最後4位</label>
                  <input type="text" class="form-control" v-model="form.gia" required>
                  <small class="is-danger" v-if="errors.sideStone">@{{errors.sideStone[0]}}</small>
              </div>
            </div>
          </div>  

          <div class="col-2">
            <div class="control has-icon-left">
              <div class="control">
                
              </div>
            </div>
          </div>
        </div>

      </div>
        <div class="row">
          <div class="column">
            <h3>Tag : @{{tag}}</h3>
            <h2>Price : @{{price}}</h2>
          </div>
          
        </div>

        <div class="row">
          <div class="column">
            <button class="btn btn-primary" @submit="save" :disabled="isProcessing" >Save</button>
          </div>
          
        </div>
    
    </div>
    </form>
  </div>


   @endSection
