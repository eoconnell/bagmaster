class BagsController < ApplicationController
  def index
    @bags = Bag.all
  end

  def create
    Bag.create params[:bag]
    redirect_to bags_path, :flash => { :success => 'Bag has been created.' }
  end

  def new
    @bag = Bag.new
  end

  def edit
    @bag = Bag.find params[:id]
  end

  def update
    bag = Bag.find params[:id]

    if bag.update_attributes params[:bag]
      redirect_to bags_path, :flash => { :success => 'Bag has been updated.' }
    else
      redirect_to :back, :flash => { :error => 'Sh!t' }
    end
  end

  def destroy
    Bag.destroy params[:id]
    redirect_to :back, :flash => { :success => 'Bag has been deleted.' }
  end
end
