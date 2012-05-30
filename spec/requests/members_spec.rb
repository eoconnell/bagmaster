require 'spec_helper'

describe "Members" do

  before do 
    @member = Member.create :first => 'Joe', :last => 'Bob', :sex => 'Male'
  end

  describe "GET /members" do
    it "displays some members" do
      visit members_path
      page.should have_content 'Joe Bob'

      # save_and_open_page
    end

    it "can navigate to create new members" do
      visit members_path
      click_link 'Create New Member'

      current_path.should == new_member_path
    end
  end

  describe "GET /members/new" do
    it "creates a new member" do
      visit new_member_path

      fill_in 'First', :with => 'Gordon'
      fill_in 'Last', :with => 'Bombay'
      choose('member_sex_male')

      click_button 'Create Member'

      current_path.should == members_path

      page.should have_content 'Member has been created.'
      page.should have_content 'Gordon Bombay'
    end
  end

  describe "PUT /members" do
    it "should update a valid member" do
      visit members_path
      click_link 'Edit'

      current_path.should == edit_member_path(@member)

      find_field('First').value.should == 'Joe'
      find_field('Last').value.should == 'Bob'

      fill_in 'First', :with => 'Charlie'
      fill_in 'Last', :with => 'Conway'

      pending 'Update radio button'

      click_button 'Update Member'

      current_path.should == members_path

      page.should have_content 'Charlie Conway'
      page.should have_content 'Member has been updated successfully.'
    end

    it "should not update a member without a first name" do
      visit members_path
      click_link 'Edit'

      current_path.should == edit_member_path(@member)

      fill_in 'First', :with => ''
      click_button 'Update Member'

      current_path.should == edit_member_path(@member)
      page.should have_content 'There was an error updating this member.'
    end

    it "should not update a member without a last name" do
      visit members_path
      click_link 'Edit'

      current_path.should == edit_member_path(@member)

      fill_in 'Last', :with => ''
      click_button 'Update Member'

      current_path.should == edit_member_path(@member)
      page.should have_content 'There was an error updating this member.'
    end
  end

  describe "DELETE /members" do
    it "should delete a member" do
      visit members_path
      find("#member_#{@member.id}").click_link 'Delete'
      page.should have_content 'Member has been deleted.'
      page.should have_no_content 'Joe Bob'
    end
  end

end
