class MembersController < ApplicationController
  def index
    @members = Member.all
  end

  def create
    Member.create params[:member]
    redirect_to members_path, :notice => 'Member has been created.'
  end

  def new
    @member = Member.new
  end

  def edit
    @member = Member.find params[:id]
  end

  def update
    member = Member.find params[:id]

    if member.update_attributes params[:member]
      redirect_to members_path, :notice => 'Member has been updated successfully.'
    else
      redirect_to :back, :flash => { :error => 'There was an error updating this member.' }
    end
  end

  def destroy
    Member.destroy params[:id]
    redirect_to :back, :notice => 'Member has been deleted.'
  end
end
