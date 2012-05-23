class Slot < ActiveRecord::Base
  has_many :bags

  validates :name, presence: true
  validates_numericality_of :capacity, :greater_than => 0
end
