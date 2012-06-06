class ReportsController < ApplicationController
  def baglist
    @bags = Bag.all
  end

  def openslots
    @slots = Slot.all
  end
end
