class SlotsController < ApplicationController
  def index
    @slots = Slot.all
  end

  def create
    Slot.create params[:slot]
    redirect_to slots_path, :flash => { :success => 'Storage Slot has been created.' }
  end

  def new
    @slot = Slot.new
  end

  def edit
    @slot = Slot.find params[:id]
  end

  def update
    slot = Slot.find params[:id]

    if slot.update_attributes params[:slot]
      redirect_to slots_path, :flash => { :success => 'Storage Slot has been updated.' }
    else
      redirect_to :back, :flash => { :error => 'There was an error updating this slot.' }
    end
  end

  def destroy
    Slot.destroy params[:id]
    redirect_to :back, :flash => { :success => 'Slot has been deleted.' }
  end
end
