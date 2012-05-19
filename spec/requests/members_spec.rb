require 'spec_helper'

describe "Members" do

  before do 
    @member = Member.create :first => 'Joe', :last => 'Bob', :sex => 'Male'
  end

  describe "GET /members" do
    it "displays some members" do
      visit members_path
      page.should have_content "Joe Bob"

      save_and_open_page
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
