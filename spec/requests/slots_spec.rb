require 'spec_helper'

describe "Slots" do

  before do
    @slot = Slot.create :name => 'A1', :capacity => 3
  end

  describe "GET /slots" do
    it "displays storage slots" do
      visit slots_path
      page.should have_content 'A1'
    end

    it "can navigate to create new slots" do
      visit slots_path
      click_link 'Create New Slot'

      current_path.should == new_slot_path
    end
  end

  describe "GET /slots/new" do
    it "creates a new storage slot" do
      visit new_slot_path

      fill_in 'Name', :with => 'A2'
      fill_in 'Capacity', :with => 3

      click_button 'Create Slot'

      current_path.should == slots_path
      page.should have_content 'Storage Slot has been created.'
      page.should have_content 'A2'
    end
  end

  describe "PUT /slots" do
    it "should update a valid storage slot" do
      visit slots_path
      click_link 'Edit'

      current_path.should == edit_slot_path(@slot)

      find_field('Name').value.should == 'A1'
      find_field('Capacity').value.should == '3'

      fill_in 'Name', :with => 'B1'
      fill_in 'Capacity', :with => 4
      click_button 'Update Slot'

      current_path.should == slots_path
      page.should have_content 'B1'
      page.should have_content 'Storage Slot has been updated.'
    end

    it "should not update a storage slot without a name" do
      visit slots_path
      click_link 'Edit'

      current_path.should == edit_slot_path(@slot)

      fill_in 'Name', :with => ''
      click_button 'Update Slot'

      current_path.should == edit_slot_path(@slot)
      page.should have_content 'There was an error updating this slot.'
    end

    it "should not update a storage slot with a capacity < 1" do
      visit slots_path
      click_link 'Edit'

      current_path.should == edit_slot_path(@slot)

      fill_in 'Capacity', :with => 0
      click_button 'Update Slot'

      current_path.should == edit_slot_path(@slot)
      page.should have_content 'There was an error updating this slot.'
    end
  end

  describe "DELETE /slots" do
    it "should delete a slot" do
      visit slots_path
      find("#slot_#{@slot.id}").click_link 'Delete'
      page.should have_content 'Slot has been deleted.'
      page.should have_no_content 'A1'
    end
  end
end
