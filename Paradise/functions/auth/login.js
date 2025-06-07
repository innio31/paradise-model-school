const jwt = require('jsonwebtoken');
const { validateUser } = require('../helpers/auth-helpers');

exports.handler = async (event) => {
  try {
    const { studentId, password } = JSON.parse(event.body);
    const user = await validateUser(studentId, password);
    
    if (!user) {
      return {
        statusCode: 401,
        body: JSON.stringify({ error: 'Invalid credentials' }),
      };
    }

    const token = jwt.sign(
      { studentId: user.studentId },
      process.env.JWT_SECRET,
      { expiresIn: '1h' }
    );

    return {
      statusCode: 200,
      body: JSON.stringify({ 
        token,
        user: {
          name: user.name,
          grade: user.grade,
          section: user.section
        }
      }),
    };
  } catch (err) {
    return {
      statusCode: 500,
      body: JSON.stringify({ error: err.message }),
    };
  }
};