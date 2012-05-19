class Bag < ActiveRecord::Base
  belongs_to :member
  belongs_to :slot
end
