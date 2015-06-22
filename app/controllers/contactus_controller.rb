class ContactusController < ApplicationController
  def index
  @contactus = Contactus.new
  end
  
  def new
    @contactus = Contactus.new
  end

  def create
    @contactus = Contactus.new(params[:contactus])
    @contactus.request = request
    if @contactus.deliver
      flash.now[:notice] = 'Thank you for your message. We will contact you soon!'
    else
      flash.now[:error] = 'Cannot send message.'
      render :new
    end
  end
end
