class MembersController < ApplicationController
  def index
    @members = Member.all
  end

  def create
  end

  def edit
  end

  def update
  end

  def destroy
    Member.destroy params[:id]
    redirect_to :back, :notice => 'Member has been deleted.'
  end
end
